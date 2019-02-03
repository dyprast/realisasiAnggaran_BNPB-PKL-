<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyerapanKeuangan extends Model
{
    protected $table = "penyerapan_keuangans";
    public function kegiatan()
    {
    	return $this->belongsTo('App\kegiatan', 'id_kegiatan');
    }
    public function subKegiatan()
    {
    	return $this->belongsTo('App\Subkegiatan', 'id_subKegiatan');
    }
    public function mak()
    {
    	return $this->belongsTo('App\MAK', 'id_mak');
    }
}
