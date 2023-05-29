@extends('user.layouts.master')

@section('title')
    Home
@endsection

@section('produkActive', 'active')
@section('produk', 'text-success')
@section($nama_jurusan, 'text-success')

@section('content')
<main role="main" style="margin-top:70px;">
     
     <div id="myCarousel" class="carousel slide pointer-event" data-ride="carousel">
       <ol class="carousel-indicators">
        @forelse($iklan_jurusans as $key => $iklan_jurusan)
         <li data-target="#myCarousel" data-slide-to="{{$loop->iteration - 1}}" class="{{ $key === 0 ? ' active' : '' }}"></li>
        @empty
        
        @endforelse
        </ol>
       <div class="carousel-inner">
        @forelse($iklan_jurusans as $key => $iklan_jurusan)
        <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
           <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title><img src="img/he.jpg" alt=""></title><rect width="100%" height="100%" fill="#777"/><img src="img/he.jpg" alt=""><text x="50%" y="50%" fill="#777" dy=".3em"> </text></svg> -->
           <a href="{{route('user.iklan_jurusan.detail', ['iklan_jurusan' => $iklan_jurusan])}}">
            <img src="{{asset('img/iklan_jurusan/'. $iklan_jurusan->foto_utama )}}" class="bd-placeholder-img" width="100%" height="100%"  alt="">
           </a>
           <div class="container">
             <div class="carousel-caption" sty>
            </div>
           </div>
         </div>
        @empty
       <h6 class="text-center mt-5">--- Tidak ada data ---</h6>
        @endforelse

       </div>
       <button class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
       </button>
       <button class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
       </button>
     </div>
   </main>

   <!-- Penawaran Kami -->
   <div class="album">
     
     <div class="container">
      <h3 class="text-center text-success mb-5">{{$nama_lengkap->nama_lengkap}}</h3>
       <h3 style="margin-bottom: 5%;">Penawaran Kami</h3>
       <div class="row">
        @forelse($penawarans as $penawaran)
         <div class="col-lg-3 col-md-6">
            <div class="card mb-4 shadow-sm">
                <a href="{{route('user.barang.detail', ['barang' => $penawaran->id])}}">
                <div class="img-container" style="max-height: 230px;">
                    <img src="{{ asset('img/barang_jasa/'.$penawaran->foto_utama) }}" class="img-fluid" alt="">
                </div>
                </a>
                <div class="card-body">
                    <h6 class="single-line">{{$penawaran->nama}}</h6>
                    <p class="card-text single-line">{{$penawaran->deskripsi}}</p>
                    <div class="d-flex justify-content-between align-items-center  mb-2">
                        <div class="bg-danger ms-2 px-1 text-white" style="display: inline-block; font-size:12px;">{{ $penawaran->diskon != 0 ? '-' . $penawaran->diskon . '%' : '' }}</div>
                        <div style="display: flex; justify-content: flex-end; align-items: end;">
                            <h6 class="text-danger" style="margin: 0 auto;">{{ $penawaran->penawaran }}</h6>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start align-items-end">
                        @if($penawaran->diskon == '0')
                        <h5 style="">Rp {{$penawaran->harga}} </h5>
                        @else
                        <h6 style="color:grey; text-decoration: line-through;">Rp.{{$penawaran->harga}}</h6>&nbsp;
                        <h5 style="color:#28a745;"> Rp.{{ intval($penawaran->harga - ($penawaran->harga * $penawaran->diskon / 100))}}</h5>
                        @endif
                    </div>
                </div>
            </div>

         </div>
         @empty
       <h6 class="text-center">--- Tidak ada data ---</h6>
         @endforelse
       </div>
     </div>
     </div>
   </div>

      <!-- List Produk -->
 <div class="album py-5">
   <div class="container">
     <h3 style="margin-bottom: 5%;">List Produk</h3>
     <div class="row">
        @forelse ($barangs as $barang)
       <div class="col-lg-2 col-md-4 col-sm-6">
         <div class="card mb-2 shadow-sm">
           <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
            <a href="{{route('user.barang.detail', ['barang' => $barang->id])}}">
                <img src="{{asset('img/barang_jasa/'. $barang->foto_utama)}}" class="bd-placeholder-img" width="100%" height="100%"  alt="">
            </a>
           <div class="card-body">
             <h6 class="single-line">{{$barang->nama}}</h6>
             <!-- <p class="card-text">Baju produk asdmaskdm askd maslkdm aslkd mkl</p> -->
             <h5 style="">Rp. {{$barang->harga}}</h5>
           </div>
         </div>
       </div>
       @empty
       <h6 class="text-center">--- Tidak ada data ---</h6>
       @endforelse
     </div>
   </div>
   </div>
 </div>

@endsection