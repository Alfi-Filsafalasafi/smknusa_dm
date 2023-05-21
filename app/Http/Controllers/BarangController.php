<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use File;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $idJurusan = $user->id_jurusan;
        
        // Mengambil baris dari tabel Barang yang memiliki id_jurusan yang sesuai
        $barang = Barang::where('id_jurusan', $idJurusan)->get();
        return view('admin.barang_jasa.index', ['barang_jasa' => $barang]);
    }

    public function detail($barang_jasa){
        $barang = Barang::find($barang_jasa);
        return view('admin.barang_jasa.detail', ['barang_jasa' => $barang]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('admin.barang_jasa.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'foto_utama' => 'required|mimes:jpeg,jpg,png',
            'foto_1' => 'mimes:jpeg,jpg,png',
            'foto_2' => 'mimes:jpeg,jpg,png',
            'nama' => 'required|min:3',
            'keterangan' => 'required|min:3',
            'harga' => 'required',
            'diskon' => '',
            'penawaran' => '',
            'tipe' => '',
            'satuan' => 'required',
            'pengiriman' => 'required',
            'narahubung_wa' => 'required|min:10',
            'link_portfolio' =>'',
        ]);
        
        

        $barang = new Barang();
        $barang->nama = $validateData['nama'];
        $barang->deskripsi = $validateData['keterangan'];
        $barang->harga = $validateData['harga'];
        $barang->diskon = $validateData['diskon'];
        $barang->penawaran = $validateData['penawaran'];
        $barang->type = $validateData['tipe'];
        $barang->pengiriman = $validateData['pengiriman'];
        $barang->narahubung_wa = $validateData['narahubung_wa'];
        $barang->satuan = $validateData['satuan'];
        $barang->link_portfolio = $validateData['link_portfolio'];
            $extFile = $request->nama;
            $extensi = $request->foto_utama->getClientOriginalExtension();
            $namaFile = $extFile."-".time().".".$extensi;
            $path = $request->foto_utama->move('img/barang_jasa',$namaFile);
            $barang->foto_utama = $namaFile;
        if($request->foto_1 == '') {

        }else {
            $extFile1 = $request->nama;
            $extensi1 = $request->foto_1->getClientOriginalExtension();
            $namaFile1 = $extFile1."-foto1-".time().".".$extensi1;
            $path = $request->foto_1->move('img/barang_jasa',$namaFile1);
            $barang->foto1 = $namaFile1;
        }
        if($request->foto_2 == '') {

        }else {
            $extFile2 = $request->nama;
            $extensi2 = $request->foto_2->getClientOriginalExtension();
            $namaFile2 = $extFile2."-foto2-".time().".".$extensi2;
            $path = $request->foto_2->move('img/barang_jasa',$namaFile2);
            $barang->foto2 = $namaFile2;
        }
        $user = Auth::user();
        $barang->id_jurusan = $user->id_jurusan;
        $barang->save();

        return redirect()->route('barang_jasa.index')
                ->with('tambah',"penambahan data {$validateData['nama']} berhasil");
    }

    public function destroy(Barang $barang_jasa){
        //hapus file 
        $gambar = Barang::where('id',$barang_jasa->id)->first();
        File::delete('img/barang_jasa/'.$barang_jasa->foto_utama);
        File::delete('img/barang_jasa/'.$barang_jasa->foto1);
        File::delete('img/barang_jasa/'.$barang_jasa->foto2);
        $barang_jasa->delete();
        return redirect()->route('barang_jasa.index')->with('hapus',"hapus data $barang_jasa->nama berhasil");

    }
    
    public function edit($barang_jasa){
        $barang = Barang::find($barang_jasa);
        return view('admin.barang_jasa.edit', ['barang_jasa' => $barang]);
    }

    public function update(Request $request, Barang $barang_jasa){
        $validateData = $request->validate([
            'foto_utama' => 'mimes:jpeg,jpg,png',
            'foto_1' => 'mimes:jpeg,jpg,png',
            'foto_2' => 'mimes:jpeg,jpg,png',
            'nama' => 'required|min:3',
            'keterangan' => 'required|min:3',
            'harga' => 'required',
            'diskon' => '',
            'penawaran' => '',
            'tipe' => '',
            'satuan' => 'required',
            'pengiriman' => 'required',
            'narahubung_wa' => 'required|min:10',
            'link_portfolio' =>'',
        ]);

        $barang = Barang::find($barang_jasa->id);
       
        $barang->nama = $validateData['nama'];
        $barang->deskripsi = $validateData['keterangan'];
        $barang->harga = $validateData['harga'];
        $barang->diskon = $validateData['diskon'];
        $barang->penawaran = $validateData['penawaran'];
        $barang->type = $validateData['tipe'];
        $barang->pengiriman = $validateData['pengiriman'];
        $barang->narahubung_wa = $validateData['narahubung_wa'];
        $barang->satuan = $validateData['satuan'];
        $barang->link_portfolio = $validateData['link_portfolio'];

        if($request->foto_utama != ''){
            File::delete('img/barang_jasa/'.$barang_jasa->foto_utama);
            $extFile = $request->nama;
            $extensi = $request->foto_utama->getClientOriginalExtension();
            $namaFile = $extFile."-".time().".".$extensi;
            $path = $request->foto_utama->move('img/barang_jasa',$namaFile);
            $barang->foto_utama = $namaFile;
        }
        if($request->foto_1 != ''){
            File::delete('img/barang_jasa/'.$barang_jasa->foto_1);
            $extFile1 = $request->nama;
            $extensi1 = $request->foto_1->getClientOriginalExtension();
            $namaFile1 = $extFile1."-foto1-".time().".".$extensi1;
            $path = $request->foto_1->move('img/barang_jasa',$namaFile1);
            $barang->foto1 = $namaFile1;
        }
        if($request->foto_2 != ''){
            File::delete('img/barang_jasa/'.$barang_jasa->foto_2);
            $extFile2 = $request->nama;
            $extensi2 = $request->foto_2->getClientOriginalExtension();
            $namaFile2 = $extFile2."-foto2-".time().".".$extensi2;
            $path = $request->foto_2->move('img/barang_jasa',$namaFile2);
            $barang->foto2 = $namaFile2;
        }
        $barang->save();

        return redirect()->route('barang_jasa.index')
                ->with('ubah',"perubahan data {$validateData['nama']} berhasil");

    }
}
