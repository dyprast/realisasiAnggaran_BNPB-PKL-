<?php

namespace App\Http\Controllers\Data\MAK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kegiatan;
use App\SubKegiatan;
use App\MAK;
use App\Paket;

class MAKController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['maks'] = MAK::orderby('id', 'desc')->get();
        return view('data.mak.index')->with($data);
    }
    public function getKSK($id_subKegiatan)
    {
        $data['subKegiatans'] = SubKegiatan::all();
        return view('data.mak.getKSK')->with($data);
    }
    public function addData()
    {
        $id_subKegiatan = \Request::get('id_subKegiatan');
        $data['subKegiatans'] = SubKegiatan::where('id', $id_subKegiatan)->get();
        $data['pakets'] = Paket::where("id_subKegiatan", $id_subKegiatan)->get();
        $data['paketc'] = Paket::where("id_subKegiatan", $id_subKegiatan)->first();
        return view('data.mak.add')->with($data);
    }
    public function saveData(Request $r)
    {
        $mak = new MAK;
        $mak->id_subKegiatan = $r->input('id_subKegiatan');
        $mak->id_paket = $r->input('id_paket');
        $mak->kode = $r->input('kode');
        $mak->mak = $r->input('mak');
        $mak->nilai = $r->input('nilai');

        $id_subKegiatan = $r->input('id_subKegiatan');
        $data = SubKegiatan::find($id_subKegiatan)->id_kegiatan;

        $Kegiatan = Kegiatan::find($data);
        $Kegiatan->nilai += $r->input('nilai');

        $Kegiatan->save();

        $SubKegiatan = SubKegiatan::find($id_subKegiatan);
        $SubKegiatan->nilai += $r->input('nilai');

        $SubKegiatan->save();

        $paket = $r->input('id_paket');
        if (!empty($paket)) {
            $data = Paket::find($paket);
            $data->nilai += $r->input('nilai');

            $data->save();
        }

        $mak->save();

        return redirect(url('MAK'));
    }
    public function editData($id)
    {
        $data['maks'] = MAK::find($id);
        $id_subKegiatan = MAK::find($id)->id_subKegiatan;
        $data['pakets'] = Paket::where("id_subKegiatan", $id_subKegiatan)->get();
        $data['paketc'] = Paket::where("id_subKegiatan", $id_subKegiatan)->first();
        return view('data.mak.edit')->with($data);
    }
    public function prosesEditData(Request $r,$id)
    {
        $makDelete = MAK::find($id);
        $SubKegiatan_id = $makDelete->id_subKegiatan;
        $data = SubKegiatan::find($SubKegiatan_id)->id_kegiatan;

        $nilai = $makDelete->nilai;
        $Kegiatan = Kegiatan::find($data);
        $Kegiatan->nilai -= $nilai;

        $Kegiatan->save();

        $SubKegiatan = SubKegiatan::find($SubKegiatan_id);
        $SubKegiatan->nilai -= $nilai;

        $SubKegiatan->save();

        $paket = $r->input('id_paket');
        if (!empty($paket)) {
            $data = Paket::find($paket);
            $data->nilai -= $nilai;

            $data->save();
        }

        $makDelete->delete();


        $mak = new MAK;
        $mak->id = $makDelete->id;
        $mak->id_subKegiatan = $r->input('id_subKegiatan');
        $mak->id_paket = $r->input('id_paket');
        $mak->kode = $r->input('kode');
        $mak->mak = $r->input('mak');
        $mak->nilai = $r->input('nilai');

        $id_subKegiatan = $r->input('id_subKegiatan');
        $data = SubKegiatan::find($id_subKegiatan)->id_kegiatan;

        $Kegiatan = Kegiatan::find($data);
        $Kegiatan->nilai += $r->input('nilai');

        $Kegiatan->save();

        $SubKegiatan = SubKegiatan::find($id_subKegiatan);
        $SubKegiatan->nilai += $r->input('nilai');

        $SubKegiatan->save();

        $mak->save();

        if (!empty($paket)) {
            $data = Paket::find($paket);
            $data->nilai += $r->input('nilai');

            $data->save();
        }

        return redirect(url('MAK'));
    }
    public function hapusData($id)
    {
        $mak = MAK::find($id);
        $SubKegiatan_id = $mak->id_subKegiatan;
        $data = SubKegiatan::find($SubKegiatan_id)->id_kegiatan;

        $nilai = $mak->nilai;
        $Kegiatan = Kegiatan::find($data);
        $Kegiatan->nilai -= $nilai;

        $Kegiatan->save();

        $SubKegiatan = SubKegiatan::find($SubKegiatan_id);
        $SubKegiatan->nilai -= $nilai;

        $SubKegiatan->save();

        if (!empty($mak->id_paket)) {
            $paket = Paket::find($mak->id_paket);
            $paket->nilai -= $nilai;

            $paket->save();
        }

        $mak->delete();

        return redirect(url('MAK')); 
    }
}
