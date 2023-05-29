<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IklanUtama;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;


class HomeUserController extends Controller
{
    public function index() {
        $iklanUtama = IklanUtama::all();
        $penawaran = DB::table('v_barang')
            ->where('penawaran', '!=', '')
            ->Orwhere('diskon', '!=', 0)
            ->get();
        $barang = DB::table('v_barang')
            ->where(function ($query) {
                $query->where('penawaran', '')
                    ->orWhereNull('penawaran');
            })
            ->where('diskon', '0')
            ->get();
    return view('user.index', [
        'iklanUtamas' => $iklanUtama, 
        'penawarans' => $penawaran,
        'barangs' => $barang
    ]);
    }

    public function tentang() {
        return view('user.tentang');
    }

    public function detailIklan($iklan_utama){
        $iklanUtama = IklanUtama::find($iklan_utama);
        return view('user..detail.iklan', ['iklan_utama' => $iklanUtama]); 
    }

    public function detailBarang($barang){
        $barangs = Barang::find($barang);
        return view('user.detail.barang', ['barang_jasa' => $barangs]); 
    }
}
