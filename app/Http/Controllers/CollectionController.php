<?php

namespace App\Http\Controllers;

use App\Album;
use App\User;
use Illuminate\Http\Request;
use App\AlbumCollection;
use Session;
class CollectionController extends Controller
{
//
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $id = $user->id;
        //find all user album collection entries
        $collection = AlbumCollection::all()->where('user_id',$id);
        $albums = [];

        //cycle through all collections and find respective albums
        foreach ($collection as $item)
        {
            $albums[$item['album_id']] = Album::where('id', $item['album_id'])->first();
        }
        return view('collection.index')->withCollection($collection)->withAlbums($albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $album = Album::find($id);
        return view('collection.create')->withAlbum($album);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = AlbumCollection::firstOrCreate(array('user_id' => $request->user_id, 'album_id'=>$request->album_id));
        $collection->save();

        Session::flash('success', 'album saved to your album list');
        return redirect()->route('collection.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
