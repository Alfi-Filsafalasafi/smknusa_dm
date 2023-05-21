<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\IklanJurusan;
use App\Models\IklanUtama;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $jmlIklanUtama = IklanUtama::count();
        $jmlhUser = User::where('hak_akses', 'admin')->count();
        $jmlhBarang = Barang::where('type', 'produk')->count();
        $jmlhJasa = Barang::where('type', 'jasa')->count();
        $dataJumlahProdukJasa = DB::table('v_jmlh_produk_jasa')->get();
        $user = Auth::user();
        $idJurusan = User::where('name', $user->name)->value('id_jurusan');
        $jmlhIklanJurusan = DB::table('v_jmlh_iklan_jurusan_tiap')->where('id_jurusan', $idJurusan)->count();
        $jmlhUserJurusan = User::where('id_jurusan', $idJurusan)->count();
        $jmlhBarangJurusan = DB::table('v_jmlh_produk_jasa')->where('id_jurusan', $idJurusan)->first();
        return view('admin.dashboard.dashboard', 
            ['jmlhIklanUtama' => $jmlIklanUtama, 
             'jmlhIklanJurusan' => $jmlhIklanJurusan,
             'jmlhUser' => $jmlhUser,
             'jmlhUserJurusan' => $jmlhUserJurusan,
             'jmlhBarang' => $jmlhBarang,
             'jmlhJasa' => $jmlhJasa,
             'jmlhProdukJasa' => $dataJumlahProdukJasa,
             'jmlhBarangJurusan' => $jmlhBarangJurusan] );
    }
}
