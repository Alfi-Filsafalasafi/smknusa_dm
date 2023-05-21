<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use File;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = DB::table('v_users')
            ->where('hak_akses', '!=', 'Super Admin')
            ->get();
        return view('admin.user.index', ['users' => $users]);
    }

    public function create(){
        $jurusan = DB::Table('jurusans')->get();
        return view('admin.user.create', ['jurusans' => $jurusan]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'foto' => 'required|mimes:jpeg,jpg,png|max:1000',
            'nip' => 'required|digits:18|unique:users',
            'email' => 'required|email|unique:users',
            'nama' => 'required|min:3',
            'no_hp' => 'required|min:10',
            'no_wa' => 'required|min:10',
            'password' => 'required|min:5',
            'jurusan' => 'required',
        ]);
        // dump($validateData);

        $user = new User();
        $extFile = $request->nama;
        $extensi = $request->foto->getClientOriginalExtension();
        $namaFile = $extFile."-".time().".".$extensi;
        $path = $request->foto->move('img/user',$namaFile);
        $user->foto = $namaFile;
        $user->name = $validateData['nama'];
        $user->email = $validateData['email'];
        $user->password = Hash::make($validateData['password']);
        $user->id_jurusan = $validateData['jurusan'];
        $user->nip = $validateData['nip'];
        $user->no_hp = $validateData['no_hp'];
        $user->no_wa = $validateData['no_wa'];
        $user->hak_akses = "Admin";
        $user->save();

        return redirect()->route('user.index')->with('tambah',"penambahan data {$validateData['nama']} berhasil");
    }

    public function edit(User $user){
        $jurusan = DB::Table('jurusans')->get();
        return view('admin.user.edit', ['user' => $user, 'jurusans' =>$jurusan]);
    }

    public function update(Request $request, User $user){
        // dump($request);
        // dump($user);
        $validateData = $request->validate([
            'foto' => 'mimes:jpeg,jpg,png|max:1000',
            'nip' => 'required|digits:18|unique:users,nip,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'nama' => 'required|min:3',
            'no_hp' => 'required|min:10',
            'no_wa' => 'required|min:10',
            'password' => 'nullable|min:5',
            'jurusan' => 'required',
        ]);

        // dump($validateData);

        $user = User::find($user->id);
        $user->name = $validateData['nama'];
        $user->email = $validateData['email'];
        if($user->password != ''){
            $user->password = Hash::make($validateData['password']);
        }
        $user->nip = $validateData['nip'];
        $user->no_hp = $validateData['no_hp'];
        $user->no_wa = $validateData['no_wa'];
        if($request->foto != ''){
            File::delete('img/user/'.$user->foto);

            $extFile = $request->nama;
            $extensi = $request->foto->getClientOriginalExtension();
            $namaFile = $extFile."-".time().".".$extensi;
            $path = $request->foto->move('img/user',$namaFile);
            $user->foto = $namaFile;
        }
        $user->id_jurusan = $validateData['jurusan'];
        $user->save();

        return redirect()->route('user.index')->with('ubah',"perubahan data {$validateData['nama']} berhasil");
    }

    public function destroy(User $user){
        //hapus file 
        $gambar = User::where('id',$user->id)->first();
        File::delete('img/user/'.$gambar->foto);
        $user->delete();
        return redirect()->route('user.index')->with('hapus',"hapus data $user->name berhasil");

    }
}
