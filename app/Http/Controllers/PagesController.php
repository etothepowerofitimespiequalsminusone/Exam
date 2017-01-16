<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class PagesController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index(){
        $albums = Album::paginate(12);

        return view('Pages.index')->withAlbums($albums);
    }
}
