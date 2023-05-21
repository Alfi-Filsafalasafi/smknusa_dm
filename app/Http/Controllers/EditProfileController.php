<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use File;

class EditProfileController extends Controller
{
    public function index($user){
        $user = User::find($user);
        return view('admin.edit_profile.index', ['user' => $user]);
    }
    public function edit($user){
        $user = User::find($user);
        return view('admin.edit_profile.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user){
        $validateData = $request->validate([
            'foto' => 'mimes:jpeg,jpg,png|max:1000',
            'nip' => 'required|digits:18',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'nama' => 'required|min:3',
            'no_hp' => 'required|min:10',
            'no_wa' => 'required|min:10',
            'password' => 'nullable|min:5',
        ]);
        // dump($validateData);

        $user = User::find($user->id);
        $user->name = $validateData['nama'];
        $user->email = $validateData['email'];
        if($request->password != ''){
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
        $user->save();
        return redirect()->route('edit_profile.index', ['user' => $user->id])->with('ubah', "Edit Profile {$validateData['nama']} berhasil");

    }
}
