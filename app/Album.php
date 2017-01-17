<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //added so that there is no mass exception, id is the only value not fillable
    protected $guarded = array('id');


    public function albumcollection(){
        $this->belongsToMany('App/AlbumCollection');
    }

    public function albumimages(){
        $this->hasMany('App/AlbumImages');
    }
}
