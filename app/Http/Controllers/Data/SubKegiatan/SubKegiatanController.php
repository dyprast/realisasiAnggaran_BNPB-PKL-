<?php

namespace App\Http\Controllers\Data\SubKegiatan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kegiatan;
use App\SubKegiatan;

class SubKegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$data['subKegiatans'] = SubKegiatan::orderby('id', 'desc')->get();
    	return view('data.subKegiatan.index')->with($data);
    }
    public function addData()
    {
    	$data['kegiatans'] = Kegiatan::all();
    	return view('data.subKegiatan.add')->with($data);
    }
    public function saveData(Request $r)
    {
    	$subKegiatan = new SubKegiatan;
    	$subKegiatan->id_kegiatan = $r->input('kegiatan');
    	$subKegiatan->kode = $r->input('kode');
    	$subKegiatan->sub_kegiatan = $r->input('sub_kegiatan');
    	$subKegiatan->nilai = 0;

    	$subKegiatan->save();

    	return redirect(url('subKegiatan'));
    }
    public function editData($id)
    {
    	$data['subKegiatans'] = SubKegiatan::find($id);
    	$data['kegiatans'] = Kegiatan::all();
    	return view('data.subKegiatan.edit')->with($data);
    }
    public function prosesEditData(Request $r,$id)
    {
    	$subKegiatan = SubKegiatan::find($id);
    	$subKegiatan->id_kegiatan = $r->input('kegiatan');
    	$subKegiatan->kode = $r->input('kode');
    	$subKegiatan->sub_kegiatan = $r->input('sub_kegiatan');
    	$subKegiatan->nilai = 0;

    	$subKegiatan->save();

    	return redirect(url('subKegiatan'));
    }
    public function hapusData($id)
    {
        
        $dataSubKegiatan = SubKegiatan::find($id);
    	SubKegiatan::find($id)->delete();
        $kegiatan_id = $dataSubKegiatan->id_kegiatan;
        $nilai = $dataSubKegiatan->nilai;
        $kegiatan = Kegiatan::find($kegiatan_id);
        $kegiatan->nilai -= $nilai;
        $kegiatan->save();

    	return redirect(url('subKegiatan')); 
    }
}
