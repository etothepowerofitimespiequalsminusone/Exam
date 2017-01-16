<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumCollection extends Model
{
    public function user(){
        $this->belongsTo('App/User');
    }
    public function albums(){
        $this->hasMany('App/Album');
    }
}
