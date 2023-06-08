<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IklanJurusan;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class IklanJurusanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $idJurusan = $user->id_jurusan;
        $jurusan = DB::table('jurusans')->where('id', $idJurusan)->first();
        
        
        // Mengambil baris dari tabel IklanJurusan yang memiliki id_jurusan yang sesuai
        $iklanJurusan = IklanJurusan::where('id_jurusan', $idJurusan)->get();
        return view('admin.iklan_jurusan.index', [
            'iklan_jurusan' => $iklanJurusan,
            'jurusan' => $jurusan]);
    }

    public function detail($iklan_jurusan){
        $iklanJurusan = IklanJurusan::find($iklan_jurusan);
        return view('admin.iklan_jurusan.detail', ['iklan_jurusan' => $iklanJurusan]);
    }

    public function create()
    {
        return view('admin.iklan_jurusan.create');
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
        
        

        $iklanJurusan = new IklanJurusan();
        $iklanJurusan->nama = $validateData['nama'];
        $iklanJurusan->keterangan = $validateData['keterangan'];
        $iklanJurusan->harga = str_replace('.', '',$validateData['harga']);
        $iklanJurusan->diskon = $validateData['diskon'];
        $iklanJurusan->penawaran = $validateData['penawaran'];
        $iklanJurusan->type = $validateData['tipe'];
            $extFile = $request->nama;
            $extensi = $request->foto_utama->getClientOriginalExtension();
            $namaFile = $extFile."-".time().".".$extensi;
            $path = $request->foto_utama->move('img/iklan_jurusan',$namaFile);
            $iklanJurusan->foto_utama = $namaFile;
        if($request->foto_1 == '') {

        }else {
            $extFile1 = $request->nama;
            $extensi1 = $request->foto_1->getClientOriginalExtension();
            $namaFile1 = $extFile1."-foto1-".time().".".$extensi1;
            $path = $request->foto_1->move('img/iklan_jurusan',$namaFile1);
            $iklanJurusan->foto1 = $namaFile1;
        }
        if($request->foto_2 == '') {

        }else {
            $extFile2 = $request->nama;
            $extensi2 = $request->foto_2->getClientOriginalExtension();
            $namaFile2 = $extFile2."-foto2-".time().".".$extensi2;
            $path = $request->foto_2->move('img/iklan_jurusan',$namaFile2);
            $iklanJurusan->foto2 = $namaFile2;
        }
        $user = Auth::user();
        $iklanJurusan->id_jurusan = $user->id_jurusan;
        $iklanJurusan->save();

        return redirect()->route('iklan_jurusan.index')
                ->with('tambah',"penambahan data {$validateData['nama']} berhasil");
    }

    public function destroy(IklanJurusan $iklan_jurusan){
        //hapus file 
        $gambar = iklanJurusan::where('id',$iklan_jurusan->id)->first();
        File::delete('img/iklan_jurusan/'.$iklan_jurusan->foto_utama);
        File::delete('img/iklan_jurusan/'.$iklan_jurusan->foto1);
        File::delete('img/iklan_jurusan/'.$iklan_jurusan->foto2);
        $iklan_jurusan->delete();
        return redirect()->route('iklan_jurusan.index')->with('hapus',"hapus data $iklan_jurusan->nama berhasil");

    }
    
    public function edit($iklan_jurusan){
        $iklanJurusan = IklanJurusan::find($iklan_jurusan);
        return view('admin.iklan_jurusan.edit', ['iklan_jurusan' => $iklanJurusan]);
    }

    public function update(Request $request, IklanJurusan $iklan_jurusan){
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

        $iklanJurusan = IklanJurusan::find($iklan_jurusan->id);
       
        $iklanJurusan->nama = $validateData['nama'];
        $iklanJurusan->keterangan = $validateData['keterangan'];
        $iklanJurusan->harga = str_replace('.', '',$validateData['harga']);
        $iklanJurusan->diskon = $validateData['diskon'];
        $iklanJurusan->penawaran = $validateData['penawaran'];
        $iklanJurusan->type = $validateData['tipe'];

        if($request->foto_utama != ''){
            File::delete('img/iklan_jurusan/'.$iklan_jurusan->foto_utama);
            $extFile = $request->nama;
            $extensi = $request->foto_utama->getClientOriginalExtension();
            $namaFile = $extFile."-".time().".".$extensi;
            $path = $request->foto_utama->move('img/iklan_jurusan',$namaFile);
            $iklanJurusan->foto_utama = $namaFile;
        }
        if($request->foto_1 != ''){
            File::delete('img/iklan_jurusan/'.$iklan_jurusan->foto1);
            $extFile1 = $request->nama;
            $extensi1 = $request->foto_1->getClientOriginalExtension();
            $namaFile1 = $extFile1."-foto1-".time().".".$extensi1;
            $path = $request->foto_1->move('img/iklan_jurusan',$namaFile1);
            $iklanJurusan->foto1 = $namaFile1;
        }
        if($request->foto_2 != ''){
            File::delete('img/iklan_jurusan/'.$iklan_jurusan->foto2);
            $extFile2 = $request->nama;
            $extensi2 = $request->foto_2->getClientOriginalExtension();
            $namaFile2 = $extFile2."-foto2-".time().".".$extensi2;
            $path = $request->foto_2->move('img/iklan_jurusan',$namaFile2);
            $iklanJurusan->foto2 = $namaFile2;
        }
        $iklanJurusan->save();

        return redirect()->route('iklan_jurusan.index')
                ->with('ubah',"perubahan data {$validateData['nama']} berhasil");

    }
}
