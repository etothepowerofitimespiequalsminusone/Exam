<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller
{

    public function index(){
        $albums = Album::paginate(12);

        return view('Pages.index')->withAlbums($albums);
    }

    public function leaked(){
        $albums = Album::all()->where('leaked',1);

        return view('Pages.leaked')->withAlbums($albums);
    }

    public function coming(){
        $albums = Album::all()->where('leaked',0);

        return view('Pages.coming')->withAlbums($albums);
    }

    public function itunes(){
        $term = Input::get('term');
        $results = $this->searchItunes($term);

        return view('Pages.itunes')->withResults($results);
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



}
