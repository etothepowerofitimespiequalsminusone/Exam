<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AdminController extends Controller
{
//     Middleware
    public function __construct() {
        // only Admin have access
        $this->middleware('admin');
    }
    public function admin(){
        return view('Admin.index');
    }
    public function wtf(){
        return view('fu');
    }

    public function albums(){
        $albums = Album::all();

        return view('Admin.albums')->withAlbums($albums);
    }
}
