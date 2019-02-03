<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kegiatan;

class SubKegiatan extends Model
{
    protected $table = "sub_kegiatans";
    public function kegiatan()
    {
    	return $this->belongsTo('App\Kegiatan', 'id_kegiatan');
    }
    public function paket()
    {
    	return $this->belongsTo('App\Kegiatan', 'id_paket');
    }   
}
