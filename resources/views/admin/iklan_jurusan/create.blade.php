@extends('admin.layouts.master')
@section('iklanJurusan','active')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center">
        <strong>Iklan Utama > Tambah Data</strong>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-4">
                <form action="{{route('iklan_jurusan.store')}}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" name="harga" id="hargaInput" value="{{ old('harga') }}" class="form-control" >
                                    </div>
                                    @error('harga')
                                        <small>{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 @error('diskon') has-error @enderror">
                                    <label for="floatingTextarea" class="form-label">Diskon <small style="font-size:12px">*boleh dikosongi</small></label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="diskon" value="{{ old('diskon') }}" class="form-control" >
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
<script>
    // Mendapatkan referensi ke elemen input
    var hargaInput = document.getElementById('hargaInput');

    // Fungsi untuk memformat nilai saat pengguna mengetik
    function formatHarga() {
        // Menghapus karakter selain angka dari nilai inputan
        var harga = hargaInput.value.replace(/[^0-9]/g, '');

        // Memformat inputan dengan menambahkan titik sebagai pemisah ribuan
        harga = new Intl.NumberFormat('id-ID').format(harga);

        // Memasukkan nilai yang telah diformat kembali ke inputan
        hargaInput.value = harga;
    }

    // Menggunakan event listener untuk memanggil fungsi formatHarga() saat pengguna mengetik
    hargaInput.addEventListener('input', formatHarga);
</script>

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