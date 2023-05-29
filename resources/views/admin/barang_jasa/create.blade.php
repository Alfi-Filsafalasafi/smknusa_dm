@extends('admin.layouts.master')
@section('barangJasa','active')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center">
        <strong>Barang > Tambah Data</strong>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-4">
                <form action="{{route('barang_jasa.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="row g-4 mb-4">
                            <div class="col-sm-12 col-lg-6">
                                <div class="mb-5 @error('foto_utama') has-error @enderror">
                                    <label for="foto_utama" class="form-label">Foto</label>
                                    <input class="form-control" name="foto_utama" type="file" id="fromFile">
                                    <img id="preview-image-before-upload" class="position-relative mt-2 w-100" src="{{asset('image/404.png')}}"
                                        alt="_belum foto ada yang di unggah">
                                        @error('foto_utama')
                                            <br><small>{{$message}}</small>
                                        @enderror
                                </div>
                                <div class="">
                                    <small><mark>Deskripsi</mark> *kosongi jika tidak mau menambah foto di deskripsi</small> <br>
                                </div>
                                <div class="mb-2 @error('foto_1') has-error @enderror">
                                    <label for="foto_1" class="form-label mt-2">Foto 1</label>
                                    <input class="form-control" name="foto_1" type="file" id="fromFile1">
                                    <img id="preview-image-before-upload1" class="position-relative mt-2" src="{{asset('image/404.png')}}"
                                        alt="_belum foto ada yang di unggah" style="max-height : 100px;">
                                    @error('foto_1')
                                        <br><small>{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 @error('foto_2') has-error @enderror">
                                    <label for="foto_2" class="form-label mt-2">Foto 2</label>
                                    <input class="form-control" name="foto_2" type="file" id="fromFile2">
                                    <img id="preview-image-before-upload2" class="position-relative mt-2" src="{{asset('image/404.png')}}"
                                        alt="_belum foto ada yang di unggah" style="max-height : 100px;">
                                    @error('foto_2')
                                        <br><small>{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="mb-3 @error('nama') has-error @enderror">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{old('nama')}}" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('nama')
                                        <small>{{$message}}</small>
                                        @enderror
                                </div>
                                <div class="mb-3 @error('keterangan') has-error @enderror">
                                    <label for="floatingTextarea" class="form-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" placeholder="Berikan deskripsi iklan disini"
                                        id="floatingTextarea" style="height: 150px;"> {{old('keterangan')}}</textarea>
                                    @error('keterangan')
                                        <small>{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 @error('harga') has-error @enderror">
                                    <label for="floatingTextarea" class="form-label">Harga </label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1" >Rp</span>
                                        <input type="number" name="harga" value="{{ old('harga') }}" class="form-control" >
                                    </div>
                                    @error('harga')
                                        <small>{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 @error('diskon') has-error @enderror">
                                    <label for="floatingTextarea" class="form-label">Diskon <small style="font-size:12px">*isi 0 jika tidak ada diskon</small></label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="diskon" value="{{ old('diskon') ?? 0 }}" class="form-control" >
                                        <span class="input-group-text" id="basic-addon1" >%</span>
                                    </div>
                                    @error('diskon')
                                        <small>{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 @error('penawaran') has-error @enderror">
                                    <label for="floatingTextarea" class="form-label">Penawaran <small style="font-size:12px">*boleh dikosongi</small></label>
                                    <input type="text" name="penawaran" class="form-control" id="exampleInputEmail1">
                                    <small style="font-size:12px">*contoh : beli 2 gratis 1</small>
                                    @error('penawaran')
                                        <small>{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tipe</label>
                                    <select name="tipe" class="form-select mb-3" aria-label="Default select example">
                                        <option value="produk">Produk</option>
                                        <option value="jasa">Jasa</option>
                                    </select>
                                </div>
                                <div class="mb-3 @error('satuan') has-error @enderror">
                                    <label for="floatingTextarea" class="form-label">Satuan <small style="font-size:12px">*contoh : pcs, KG, </small></label>
                                    <input type="text" name="satuan" class="form-control" value="{{old('satuan')}}" id="exampleInputEmail1">
                                    @error('satuan')
                                        <small>{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 @error('pengiriman') has-error @enderror">
                                    <label for="floatingTextarea" class="form-label">Pengiriman <small style="font-size:12px">*contoh : ambil di tempat, JNE, antar</small></label>
                                    <input type="text" name="pengiriman" value="{{old('pengiriman')}}" class="form-control" id="exampleInputEmail1">
                                    @error('pengiriman')
                                        <small>{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 @error('narahubung_wa') has-error @enderror">
                                    <label for="floatingTextarea" class="form-label">Narahubung WA <small style="font-size:12px"></small></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1" >+62</span>
                                        <input type="number" name="narahubung_wa" value="{{ old('no_wa') ?? $user->no_wa }}" class="form-control" >
                                    </div>
                                    @error('narahubung_wa')
                                        <small>{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 @error('link_portfolio') has-error @enderror">
                                    <label for="floatingTextarea" class="form-label">Link Portfolio <small style="font-size:12px">*boleh dikosongi </small></label>
                                        <input type="text" name="link_portfolio" value="{{ old('link_portfolio')}}" class="form-control" >
                                    @error('link_portfolio')
                                        <small>{{$message}}</small>
                                    @enderror
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
 
   
   $('#fromFile').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });

   $('#fromFile1').change(function(){
            
        let reader = new FileReader();
         
        reader.onload = (e) => { 
         
            $('#preview-image-before-upload1').attr('src', e.target.result); 
        }
         
        reader.readAsDataURL(this.files[0]); 
           
    });

    $('#fromFile2').change(function(){
            
        let reader = new FileReader();
             
        reader.onload = (e) => { 
             
            $('#preview-image-before-upload2').attr('src', e.target.result); 
        }
             
        reader.readAsDataURL(this.files[0]); 
           
    });
   
});
 
</script>
@endsection