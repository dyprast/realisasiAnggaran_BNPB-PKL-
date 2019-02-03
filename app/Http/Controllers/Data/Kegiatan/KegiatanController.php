<?php

namespace App\Http\Controllers\Data\Kegiatan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kegiatan;

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$data['kegiatans'] = Kegiatan::orderby('id', 'desc')->get();
    	return view('data.kegiatan.index')->with($data);
    }
    public function addData()
    {
    	return view('data.kegiatan.add');
    }
    public function saveData(Request $r)
    {
    	$kegiatan = new Kegiatan;
    	$kegiatan->kode = $r->input('kode');
    	$kegiatan->kegiatan = $r->input('kegiatan');
    	$kegiatan->nilai = 0;

    	$kegiatan->save();

    	return redirect(url('kegiatan'));
    }
    public function editData($id)
    {
    	$data['kegiatans'] = Kegiatan::find($id);
    	return view('data.kegiatan.edit')->with($data);
    }
    public function prosesEditData(Request $r,$id)
    {
    	$kegiatan = Kegiatan::find($id);
    	$kegiatan->kode = $r->input('kode');
    	$kegiatan->kegiatan = $r->input('kegiatan');
    	$kegiatan->nilai = 0;

    	$kegiatan->save();

    	return redirect(url('kegiatan'));
    }
    public function hapusData($id)
    {
    	Kegiatan::find($id)->delete();
    	return redirect(url('kegiatan')); 
    }
}
