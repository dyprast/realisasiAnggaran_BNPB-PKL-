<?php

namespace App\Http\Controllers\Data\PenyerapanKeuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kegiatan;
use App\SubKegiatan;
use App\MAK;
use App\PenyerapanKeuangan;
use App\Paket;

class PenyerapanKeuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$data['penyerapanKeuangans'] = PenyerapanKeuangan::orderby('id', 'desc')->get();
    	return view('data.penyerapanKeuangan.index')->with($data);
    }
    public function addDataGetSubKegiatan()
    {
    	$data['subKegiatans'] = SubKegiatan::all();
    	return view('data.penyerapanKeuangan.getSubKegiatan')->with($data);
    }
    public function addData()
    {
    	$id_subKegiatan = \Request::get('sub_kegiatan');
        $data['subKegiatans'] = SubKegiatan::where('id', $id_subKegiatan)->get();
        $kegiatan = SubKegiatan::find($id_subKegiatan)->id_kegiatan;
        $data['kegiatans'] = Kegiatan::where('id', $kegiatan)->get();
    	$data['maks'] = MAK::where("id_subKegiatan", $id_subKegiatan)->orderby('id_paket')->get();
        $data['pakets'] = Paket::where("id_subKegiatan", $id_subKegiatan)->first();
    	return view('data.penyerapanKeuangan.add')->with($data);
    }
    public function saveData(Request $r)
    {
    	$penyerapanKeuangan = new PenyerapanKeuangan;
    	$penyerapanKeuangan->id_mak = $r->input('id_mak');
    	$penyerapanKeuangan->realisasi_kegiatan = $r->input('realisasi_kegiatan');
    	$penyerapanKeuangan->realisasi_nilai = $r->input('realisasi_nilai');

    	$penyerapanKeuangan->save();

        $maks = MAK::find($r->input('id_mak'));
        $maks->realisasi_nilai += $r->input('realisasi_nilai');

        $kegiatan = Kegiatan::find($r->input('id_kegiatan'));
        $kegiatan->realisasi_nilai += $r->input('realisasi_nilai');

        $SubKegiatan = SubKegiatan::find($r->input('id_subKegiatan'));
        $SubKegiatan->realisasi_nilai += $r->input('realisasi_nilai');

        $maks->save();
        $SubKegiatan->save();
        $kegiatan->save();

    	return redirect(url('penyerapanKeuangan'));
    }
    public function editData($id)
    {
    	$data['penyerapanKeuangans'] = PenyerapanKeuangan::find($id);

    	$id_maks = PenyerapanKeuangan::find($id)->id_mak; 
        $id_subKegiatan = MAK::find($id_maks)->id_subKegiatan;
        $id_kegiatan = SubKegiatan::find($id_subKegiatan)->id_kegiatan;

        $data['maks'] = MAK::where("id_subKegiatan", $id_subKegiatan)->orderby('kode')->get();

        $data['subKegiatans'] = SubKegiatan::where('id', $id_subKegiatan)->get();
        $data['kegiatans'] = Kegiatan::where('id', $id_kegiatan)->get();

    	return view('data.penyerapanKeuangan.edit')->with($data);
    }
    public function prosesEditData(Request $r,$id)
    {
        $penyerapanKeuanganDelete = PenyerapanKeuangan::find($id);
        $realisasi_nilaiDelete = $penyerapanKeuanganDelete->realisasi_nilai;

        $id_makDelete = $penyerapanKeuanganDelete->id_mak;
        $maksDelete = MAK::find($id_makDelete);
        $maksDelete->realisasi_nilai -= $realisasi_nilaiDelete;

        $id_subKegiatan = $maksDelete->id_subKegiatan;
        $SubKegiatanDelete = SubKegiatan::find($id_subKegiatan);
        $SubKegiatanDelete->realisasi_nilai -= $realisasi_nilaiDelete;

        $id_kegiatan = $SubKegiatanDelete->id_kegiatan;
        $kegiatanDelete = Kegiatan::find($id_kegiatan);
        $kegiatanDelete->realisasi_nilai -= $realisasi_nilaiDelete;

        $maksDelete->save();
        $SubKegiatanDelete->save();
        $kegiatanDelete->save();
        $penyerapanKeuanganDelete->delete();

    	$penyerapanKeuangan = new PenyerapanKeuangan;
        $penyerapanKeuangan->id = $id;
    	$penyerapanKeuangan->id_mak = $r->input('id_mak');
    	$penyerapanKeuangan->realisasi_kegiatan = $r->input('realisasi_kegiatan');
    	$penyerapanKeuangan->realisasi_nilai = $r->input('realisasi_nilai');

    	$penyerapanKeuangan->save();

        $maks = MAK::find($r->input('id_mak'));
        $maks->realisasi_nilai += $r->input('realisasi_nilai');

        $kegiatan = Kegiatan::find($r->input('id_kegiatan'));
        $kegiatan->realisasi_nilai += $r->input('realisasi_nilai');

        $SubKegiatan = SubKegiatan::find($r->input('id_subKegiatan'));
        $SubKegiatan->realisasi_nilai += $r->input('realisasi_nilai');

        $maks->save();
        $SubKegiatan->save();
        $kegiatan->save();

    	return redirect(url('penyerapanKeuangan'));
    }
    public function hapusData($id)
    {
        $penyerapanKeuangan = PenyerapanKeuangan::find($id);
    	$realisasi_nilai = $penyerapanKeuangan->realisasi_nilai;

        $id_mak = $penyerapanKeuangan->id_mak;
        $maks = MAK::find($id_mak);
        $maks->realisasi_nilai -= $realisasi_nilai;

        $id_subKegiatan = $maks->id_subKegiatan;
        $SubKegiatan = SubKegiatan::find($id_subKegiatan);
        $SubKegiatan->realisasi_nilai -= $realisasi_nilai;

        $id_kegiatan = $SubKegiatan->id_kegiatan;
        $kegiatan = Kegiatan::find($id_kegiatan);
        $kegiatan->realisasi_nilai -= $realisasi_nilai;

        $maks->save();
        $SubKegiatan->save();
        $kegiatan->save();
        $penyerapanKeuangan->delete();

    	return redirect(url('penyerapanKeuangan')); 
    }
}
