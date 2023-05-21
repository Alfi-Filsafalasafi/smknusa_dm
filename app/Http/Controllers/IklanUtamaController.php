<?php

namespace App\Http\Controllers;

use App\Models\IklanUtama;
use Illuminate\Http\Request;

use File;

class IklanUtamaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $iklanUtama = IklanUtama::all();
        return view('admin.iklan_utama.index', ['iklan_utama' => $iklanUtama]);
    }

    public function detail($iklan_utama){
        $iklanUtama = IklanUtama::find($iklan_utama);
        return view('admin.iklan_utama.detail', ['iklan_utama' => $iklanUtama]);
    }

    public function create()
    {
        return view('admin.iklan_utama.create');
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
        ]);
        
        

        $iklanUtama = new iklanUtama();
        $iklanUtama->nama = $validateData['nama'];
        $iklanUtama->keterangan = $validateData['keterangan'];
        $iklanUtama->harga = $validateData['harga'];
        $iklanUtama->diskon = $validateData['diskon'];
        $iklanUtama->penawaran = $validateData['penawaran'];
        $iklanUtama->type = $validateData['tipe'];
            $extFile = $request->nama;
            $extensi = $request->foto_utama->getClientOriginalExtension();
            $namaFile = $extFile."-".time().".".$extensi;
            $path = $request->foto_utama->move('img/iklan_utama',$namaFile);
            $iklanUtama->foto_utama = $namaFile;
        if($request->foto_1 == '') {

        }else {
            $extFile1 = $request->nama;
            $extensi1 = $request->foto_1->getClientOriginalExtension();
            $namaFile1 = $extFile1."-foto1-".time().".".$extensi1;
            $path = $request->foto_1->move('img/iklan_utama',$namaFile1);
            $iklanUtama->foto1 = $namaFile1;
        }
        if($request->foto_2 == '') {

        }else {
            $extFile2 = $request->nama;
            $extensi2 = $request->foto_2->getClientOriginalExtension();
            $namaFile2 = $extFile2."-foto2-".time().".".$extensi2;
            $path = $request->foto_2->move('img/iklan_utama',$namaFile2);
            $iklanUtama->foto2 = $namaFile2;
        }
        $iklanUtama->save();

        return redirect()->route('iklan_utama.index')
                ->with('tambah',"penambahan data {$validateData['nama']} berhasil");
    }

    public function destroy(IklanUtama $iklan_utama){
        //hapus file 
        $gambar = IklanUtama::where('id',$iklan_utama->id)->first();
        File::delete('img/iklan_utama/'.$iklan_utama->foto_utama);
        File::delete('img/iklan_utama/'.$iklan_utama->foto1);
        File::delete('img/iklan_utama/'.$iklan_utama->foto2);
        $iklan_utama->delete();
        return redirect()->route('iklan_utama.index')->with('hapus',"hapus data $iklan_utama->nama berhasil");

    }
    
    public function edit($iklan_utama){
        $iklanUtama = IklanUtama::find($iklan_utama);
        return view('admin.iklan_utama.edit', ['iklan_utama' => $iklanUtama]);
    }

    public function update(Request $request, IklanUtama $iklan_utama){
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
        ]);

        $iklanUtama = IklanUtama::find($iklan_utama->id);
       
        $iklanUtama->nama = $validateData['nama'];
        $iklanUtama->keterangan = $validateData['keterangan'];
        $iklanUtama->harga = $validateData['harga'];
        $iklanUtama->diskon = $validateData['diskon'];
        $iklanUtama->penawaran = $validateData['penawaran'];
        $iklanUtama->type = $validateData['tipe'];

        if($request->foto_utama != ''){
            File::delete('img/iklan_utama/'.$iklan_utama->foto_utama);
            $extFile = $request->nama;
            $extensi = $request->foto_utama->getClientOriginalExtension();
            $namaFile = $extFile."-".time().".".$extensi;
            $path = $request->foto_utama->move('img/iklan_utama',$namaFile);
            $iklanUtama->foto_utama = $namaFile;
        }
        if($request->foto_1 != ''){
            File::delete('img/iklan_utama/'.$iklan_utama->foto1);
            $extFile1 = $request->nama;
            $extensi1 = $request->foto_1->getClientOriginalExtension();
            $namaFile1 = $extFile1."-foto1-".time().".".$extensi1;
            $path = $request->foto_1->move('img/iklan_utama',$namaFile1);
            $iklanUtama->foto1 = $namaFile1;
        }
        if($request->foto_2 != ''){
            File::delete('img/iklan_utama/'.$iklan_utama->foto1);
            $extFile2 = $request->nama;
            $extensi2 = $request->foto_2->getClientOriginalExtension();
            $namaFile2 = $extFile2."-foto2-".time().".".$extensi2;
            $path = $request->foto_2->move('img/iklan_utama',$namaFile2);
            $iklanUtama->foto2 = $namaFile2;
        }
        $iklanUtama->save();

        return redirect()->route('iklan_utama.index')
                ->with('ubah',"perubahan data {$validateData['nama']} berhasil");

    }
    // Tambahkan metode lain sesuai kebutuhan Anda
}
