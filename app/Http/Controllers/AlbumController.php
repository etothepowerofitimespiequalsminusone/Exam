<?php

namespace App\Http\Controllers;

use App\AlbumImages;
use App\Notifications\AlbumLeak;
use Illuminate\Http\Request;
use App\Album;
use Illuminate\Notifications\Notification;
use Session;
use App\User;
use SimpleXMLElement;
use Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $this->middleware('admin');
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
        $album = Album::firstOrCreate(array('title' => $request->title, 'artist'=>$request->artist));
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
        $this->middleware('admin');
        $album = Album::find($id);
        $albumimages = AlbumImages::all()->where('album_id',$album->id);


        return view('album.edit')->withAlbum($album)->withImages($albumimages);
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
        $this->middleware('admin');
        $album = Album::find($id);
        $album->title = $request->title;
        $album->artist = $request->artist;
        $album->released = $request->released;
        $album->albumUrl = $request->albumUrl;
        $album->description = $request->description;
        $album->save();

        Session::flash('success','Album was successfully saved');
//        Notification::send(User::all(),new AlbumLeak($album));

        //select all users who follow this album
        $user = User::find(2);

        //notify these users
        $user->notify(new AlbumLeak($album->title));

        //redirect back to edit page
        return redirect()->route('album.show',$album->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('admin');
        $album = Album::find($id);
        $album->delete();
        return redirect()->route('album.index');
    }

    public function getXmlData(){
        //have to use curl here because of the security of the server
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,'http://hasitleaked.com/feed/');
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'MusicTracker');
        $xmlsoon = curl_exec($curl_handle);
        curl_close($curl_handle);
        $x = new SimpleXMLElement($xmlsoon);
        $albms = $x->channel->item;
        foreach($albms as $albm)
        {
            $artist= substr($albm->title,0,strpos(strval($albm->title),':')-1);
            $title = substr(strval($albm->title),strpos(strval($albm->title),':')+1);
            $published_date = strtotime($albm->pubdate);
            $released = date('Y-m-d', $published_date);
            $albumUrl = strval($albm->link);
//            go through all genre tags and concatenate them together
            $genre = strval($albm->category);
            $description = strval($albm->description);
            // if the album is not in the database then create it, but if it is then update it
            $album = Album::firstOrCreate(array('title' => $title, 'artist'=>$artist));
            $album->released = $released;
            $album->genre = $genre;
            $album->description = $description;
            $album->save();
        }
        //do the same thing with leaked album rss feed
        $leaked= 'http://hasitleaked.com/leakedfeed/';
        $xml = @simplexml_load_file($leaked);
        $item = $xml->channel->item;
        $albumnames = array();

        foreach($item as $album)
        {
            $albumnames[] = $album->title;
            //check if album isn't in the database
            //if it isn't then add insert
            $artist= substr($album->title,0,strpos(strval($album->title),':')-1);
            $title = substr(strval($album->title),strpos(strval($album->title),':')+1);
            $published_date = strtotime($album->pubdate);
            $released = date('Y-m-d', $published_date);
            $albumUrl = strval($album->link);
//            go through all genre tags and concatenate them together
            $genre = strval($album->category);
            $description = strval($album->description);


            // if the album is not in the database then create it, but if it is then update it
            $album = Album::firstOrCreate(array('title' => $title, 'artist'=>$artist));
            $album->released = $released;
            $album->genre = $genre;
            $album->description = $description;
            $album->leaked = true;
            $album->save();
        }
        return $albumnames;
    }
    public function searchItunes($keyword){
        $entity = 'album';
        $attribute = 'albumTerm';
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
