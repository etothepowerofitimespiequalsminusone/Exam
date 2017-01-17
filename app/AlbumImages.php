<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumImages extends Model
{
    public function album()
    {
        $this->belongsTo('App/Album');
    }
}
