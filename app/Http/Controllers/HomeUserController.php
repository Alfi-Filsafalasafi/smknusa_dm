<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IklanUtama;
use App\Models\IklanJurusan;
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
        return view('user.detail.iklan', ['iklan_utama' => $iklanUtama]); 
    }

    public function detailIklanJurusan($iklan_jurusan){
        $iklanJurusan = IklanJurusan::find($iklan_jurusan);
        // dump($iklanJurusan);
        return view('user.detail.iklan_jurusan', ['iklan_jurusan' => $iklanJurusan]); 
    }

    public function detailBarang($barang){
        $barangs = Barang::find($barang);
        return view('user.detail.barang', ['barang_jasa' => $barangs]); 
    }

    public function produk($nama, $id_jurusan){
        $iklan_jurusan = IklanJurusan::where('id_jurusan', $id_jurusan)->get();
        $barang = DB::table('v_barang')
            ->where('id_jurusan', $id_jurusan)
            ->where(function ($query) {
                $query->where('penawaran', '')
                    ->orWhereNull('penawaran');
            })
            ->where('diskon', '0')
            ->get();
        $nama_jurusan = $nama;
        $nama_lengkap = DB::table('jurusans')->where('id', $id_jurusan)->first();
        $penawaran = DB::table('v_barang')
            ->where('id_jurusan', $id_jurusan)
            ->where(function ($query) {
                $query->where('penawaran', '!=', '')
                    ->orWhere('diskon', '!=', 0);
            })
            ->get();

        // dump($penawaran);
        return view('user.produk', [
            'nama_jurusan' => $nama_jurusan,
            'barangs' => $barang,
            'nama_lengkap' => $nama_lengkap,
            'penawarans' => $penawaran,
            'iklan_jurusans' => $iklan_jurusan 
        ]);
    }

    public function caraPesan(){
        return view('user.cara_pesan');
    }
}
