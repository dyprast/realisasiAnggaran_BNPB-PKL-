<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAK extends Model
{
    protected $table = "maks";
    public function kegiatan()
    {
    	return $this->belongsTo('App\kegiatan', 'id_kegiatan');
    }
    public function subKegiatan()
    {
    	return $this->belongsTo('App\Subkegiatan', 'id_subKegiatan');
    }
    public function paket()
    {
    	return $this->belongsTo('App\Paket', 'id_paket');
    }

}
