<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = "pakets";
    public function subKegiatan()
    {
    	return $this->belongsTo('App\SubKegiatan', 'id_subKegiatan');
    }
    public function maks()
    {
    	return $this->belongsTo('App\MAK', 'id_mak');
    }
}
