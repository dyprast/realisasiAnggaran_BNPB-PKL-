<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = "kegiatans";
    public function kegiatan()
    {
    	return $this->belongsTo('App\SubKegiatan');
    }
}
