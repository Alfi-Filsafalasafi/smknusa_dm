@extends('admin.layouts.master')
@section('user','active')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-4">
                <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                        <div class="row g-4 mb-4">
                            <div class="col-sm-12 col-lg-6">
                                <div class="mb-2 @error('foto') has-error @enderror">
                                    <label for="foto" class="form-label mt-2">Foto Profile</label>
                                    <small>*kosongi jika tidak mau merubah foto profile</small>
                                    <input class="form-control"  name="foto" type="file" id="fromFile1">
                                    <img id="preview-image-before-upload1" class="position-relative mt-2" src="{{asset('img/user/'.$user->foto)}}"
                                        alt="_belum foto ada yang di unggah" style="max-height : 100px;">
                                    @error('foto')
                                        <br><small>{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="mb-3 @error('nip') has-error @enderror">
                                    <label for="exampleInputEmail1" class="form-label">NIP</label>
                                    <input type="number" name="nip" value="{{ old('nip') ?? $user->nip}}" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('nip')
                                        <small>{{$message}}</small>
                                        @enderror
                                </div>
                                <div class="mb-3 @error('nama') has-error @enderror">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" name="nama" value="{{ old('nama') ?? $user->name }}" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('nama')
                                        <small>{{$message}}</small>
                                        @enderror
                                </div>
                                <div class="mb-3 @error('email') has-error @enderror">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ old('email') ?? $user->email }}" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('email')
                                        <small>{{$message}}</small>
                                        @enderror
                                </div>
                                <div class="mb-3 @error('no_hp') has-error @enderror">
                                    <label for="exampleInputEmail1" class="form-label">No Handphone</label>
                                    <input type="number" name="no_hp" value="{{ old('no_hp') ?? $user->no_hp }}" class="form-control"
                                        aria-describedby="emailHelp">
                                        @error('no_hp')
                                        <small>{{$message}}</small>
                                        @enderror
                                </div>
                                <div class="mb-3 @error('no_wa') has-error @enderror">
                                    <label for="exampleInputEmail1" class="form-label">No Whatsapp</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1" >+62</span>
                                        <input type="number" name="no_wa" value="{{ old('no_wa') ?? $user->no_wa }}" class="form-control" >
                                    </div>
                                    @error('no_wa')
                                    <small>{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 @error('password') has-error @enderror">
                                    <label for="exampleInputEmail1" class="form-label">Password</label>
                                    <small>*kosongi jika tidak mau merubah</small>
                                    <input type="password" name="password" value="{{ old('password')}}" class="form-control" id="exampleInputEmail1">
                                        @error('password')
                                        <small>{{$message}}</small>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="form-label">Admin Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-select">
                                    @foreach($jurusans as $jurusan)
                                        <option value="{{ $jurusan->id }}" {{(old('jurusan') ?? $user->id_jurusan) ==  $jurusan->id ? 'selected' : '' }}>
                                            {{ $jurusan->nama }}
                                        </option>
                                    @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('jquery.js') }}"></script>


<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#fromFile1').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload1').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
@endsection