<?php

namespace App\Http\Controllers;

use App\Models\ppic;
use DB;
use Illuminate\Http\Request;
use Redirect;

class HomeController extends Controller
{
    //
    
    public function home(Request $request) {

        $cari_data = $request->cari_data;
        $query = ppic::query();
        $query -> select('*');

        if($cari_data != ''){
            $query -> where('kode_item','like','%'.$cari_data.'%');
        }

        $ppic = $query -> get();

        return view('index', compact('ppic'));
    }

    public function index2(Request $request) {

        $query = ppic::query();
        $query -> select('*');
        $ppic = $query -> get();

        return view('index2', compact('ppic'));
    }

    public function store(Request $request){
        $kode_item = $request->kode_item;
        $plant = $request->plant;
        $unit = $request->unit;
        $kiln = $request->kiln;
        $persen = $request->persen;
        $isi = $request->isi;
        $lower_punch = $request->lower_punch;
        $upper_punch = $request->upper_punch;
        $merk = $request->merk;
        $size = $request->size;
        $motif = $request->motif;
        $le = $request->le;
        $kode_komposisi = $request->kode_komposisi;
        $total_komposisi = $request->total_komposisi;
        $berat_kering = $request->berat_kering;

        $data = [
            'kode_item' => $kode_item,
            'plant' => $plant,
            'unit' => $unit,
            'kiln' => $kiln,
            'persen' => $persen,
            'isi' => $isi,
            'lower_punch' => $lower_punch,
            'upper_punch' => $upper_punch,
            'merk' => $merk,
            'size' => $size,
            'motif' => $motif,
            'le' => $le,
            'kode_komposisi' => $kode_komposisi,
            'total_komposisi' => $total_komposisi,
            'berat_kering' => $berat_kering
        ];

        $cek = DB::table('ppic')->where('kode_item', $kode_item)->count();
        if($cek > 0){
            return Redirect::back()->with(['success' => 'Data dengan kode '. $kode_item . ' sudah ada']);
        }

        $simpan = DB::table('ppic')->insert($data);
        if($simpan){
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function editForm(Request $request){
        $kode_item = $request ->kode_item;

        $data = DB::table('ppic')
            ->where('kode_item', $kode_item)
            ->first();

        return view('formEdit', compact('data'));
    }

    public function updateProses($kode_item, Request $request){
        $plant = $request->plant;
        $unit = $request->unit;
        $kiln = $request->kiln;
        $persen = $request->persen;
        $isi = $request->isi;
        $lower_punch = $request->lower_punch;
        $upper_punch = $request->upper_punch;
        $merk = $request->merk;
        $size = $request->size;
        $motif = $request->motif;
        $le = $request->le;
        $kode_komposisi = $request->kode_komposisi;
        $total_komposisi = $request->total_komposisi;
        $berat_kering = $request->berat_kering;

        $data = [
            'plant' => $plant,
            'unit' => $unit,
            'kiln' => $kiln,
            'persen' => $persen,
            'isi' => $isi,
            'lower_punch' => $lower_punch,
            'upper_punch' => $upper_punch,
            'merk' => $merk,
            'size' => $size,
            'motif' => $motif,
            'le' => $le,
            'kode_komposisi' => $kode_komposisi,
            'total_komposisi' => $total_komposisi,
            'berat_kering' => $berat_kering
        ];

        $update = DB::table('ppic')
            ->where('kode_item', $kode_item)
            ->update($data);

        if($update){
            return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function deleteProses($kode_item){
        $delete = DB::table('ppic')->where('kode_item', $kode_item)->delete();

        if($delete){
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else{
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
}
