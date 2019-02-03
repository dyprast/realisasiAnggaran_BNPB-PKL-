<?php

namespace App\Http\Controllers\Data\Paket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paket;
use App\SubKegiatan;
use App\Kegiatan;

class PaketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id_subKegiatan)
    {
    	$data['pakets'] = Paket::where('id_subKegiatan', $id_subKegiatan)->orderby('id', 'desc')->get();
    	$data['subKegiatans'] = SubKegiatan::find($id_subKegiatan);
    	return view('data.paket.index')->with($data);
    }
    public function addData($id_subKegiatan)
    {
    	$data['subKegiatans'] = SubKegiatan::find($id_subKegiatan);
    	return view('data.paket.add')->with($data);
    }
    public function saveData(Request $r, $id_subKegiatan)
    {
    	$paket = new Paket;
    	$paket->id_subKegiatan = $id_subKegiatan;
    	$paket->paket = $r->input('paket');
    	$paket->keterangan_paket = $r->input('keterangan_paket');
    	$paket->nilai = 0;
        $paket->check_maks = 0;

    	$paket->save();

        $subKegiatan = SubKegiatan::find($id_subKegiatan);
        $subKegiatan->check_pakets = 1;

        $subKegiatan->save();

    	return redirect(url('subKegiatan/paket/'.$id_subKegiatan));
    }
    public function editData($id_subKegiatan,$id)
    {
    	$data['subKegiatans'] = SubKegiatan::find($id_subKegiatan);
    	$data['pakets'] = Paket::find($id);
    	return view('data.paket.edit')->with($data);
    }
    public function prosesEditData(Request $r,$id_subKegiatan,$id)
    {
    	$paket = Paket::find($id);
    	$paket->id_subKegiatan = $id_subKegiatan;
    	$paket->paket = $r->input('paket');
    	$paket->keterangan_paket = $r->input('keterangan_paket');
        $paket->check_maks = 0;

    	$paket->save();

        $subKegiatan = SubKegiatan::find($id_subKegiatan);
        $subKegiatan->check_pakets = 1;

        $subKegiatan->save();

    	return redirect(url('subKegiatan/paket/'.$id_subKegiatan));
    }
    public function hapusData($id_subKegiatan,$id)
    {
        $nilai = Paket::where("id_subKegiatan", $id_subKegiatan)->first()->nilai;

        Paket::find($id)->delete();
        $check_paket = Paket::where("id_subKegiatan", $id_subKegiatan)->count();
        $subKegiatan = SubKegiatan::find($id_subKegiatan);
        $subKegiatan->nilai -= $nilai;
        $subKegiatan->save();

        if ($check_paket == 0) {
            $subKegiatan2 = SubKegiatan::find($id_subKegiatan);
            $subKegiatan2->check_pakets = 0;
            $subKegiatan2->save();
        }

        $kegiatan = Kegiatan::find($subKegiatan->id_kegiatan);
        $kegiatan->nilai -= $nilai;
        $kegiatan->save();
    	return redirect(url('subKegiatan/paket/'.$id_subKegiatan));
    }
}
