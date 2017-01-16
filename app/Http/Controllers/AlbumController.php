<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $albums = Album::paginate(10);
        $this->getXmlData();
        return view('album.index')->withAlbums($albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->getXmlData();
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
//        $this->validate($request,array(
//            'title' => 'required|max:255',
//            'artist' => 'required',
//            'released' => 'required',
//            'albumUrl' => 'required'
//        ));
        //store in the database
        $album = new Album();
        $album->title = $request->title;
        $album->artist = $request->artist;
        $album->released = $request->released;
        $album->albumUrl = $request->albumUrl;
        $album->genre = $request->genre;
        $album->description = $request->description;
        $album->save();
        Session::flash('success','Album was successfully saved');
        //redirect to another page
        return redirect()->route('album.show',$album->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);
        //if user checks the check-box then the respective album id gets passed to function
        //function adds the selected album to users "watching list"
        return view('album.show')->withAlbum($album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        return view('album.edit')->withAlbum($album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();
        return redirect()->route('album.index');
    }

    public function getXmlData(){
        //this is the 'coming soon' rss feedback
        $coming_soon = 'http://hasitleaked.com/feed/';
        //this is the leaked album rss feed
        $leaked= 'http://hasitleaked.com/leakedfeed/';
        $xml = @simplexml_load_file($leaked);
        $item = $xml->channel->item;
        $albumnames = array();
//        DB::table('albums')
//            ->where('id', 2)
//            ->update(['title' => $item->title]);
        foreach($item as $album)
        {
            $albumnames[] = $album->title;
            //check if album isn't in the database
            //if it isn't then add insert
            $artist= substr($album->title,0,strpos(strval($album->title),':')-1);
            $title = substr(strval($album->title),strpos(strval($album->title),':')+1);
            $published_date = strtotime($album->pubdate);
            $released = date('Y-m-d', $published_date);
            //find the cover in itunes store
//            $keyword = $artist ." ". $title;
//            $result = $this->searchItunes($keyword);
//            $albumUrl = $result->collectionViewUrl;
            $albumUrl = strval($album->link);
//            go through all genre tags and concatenate them together
            $genre = strval($album->category);
            $description = strval($album->description);
            // if the album is not in the database, then save it
            Album::firstOrCreate(array('title'=>$title, 'artist'=>$artist,'released'=>$released,'albumURL'=>$albumUrl,'genre'=>$genre,
                'description'=>$description));
//this was for testing purposes
//            DB::table('albums')->insert([
//                ['title' => $title, 'artist' => $artist,'released'=>$released,'albumURL'=>$albumUrl,'genre'=>$genre,
//                'description'=>$description],
//            ]);
        }
        return $albumnames;
    }
    public function searchItunes($keyword){
        $entity = 'album';
        $attribute = 'albumTerm';
//        $tags = $keyword;
        $url_data = array(
            'entity'=>$entity,
            'term'=>$keyword
        );
        //https://itunes.apple.com/search?entity=album&term=self-titled-darknet
        $url_beg = 'https://itunes.apple.com/search?';
        $url_tags = http_build_query($url_data);
        $url_full = $url_beg . $url_tags;
        $file = file_get_contents($url_full);
        $json_data = json_decode($file);
        $results = $json_data->results;
        return $results;
    }
    public function findCover(){
        $albums = Album::all();
        foreach ($albums as $album){
            $keyword = $album->title . " " . $album->artist;
            $result = $this->searchItunes($keyword);
            $cover = $result[0]->collectionViewUrl;
        }
    }



}
