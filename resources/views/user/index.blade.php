@extends('user.layouts.master')

@section('title')
    Home
@endsection

@section('homeActive', 'active')
@section('home', 'text-success')
@section('content')
    
    <main role="main" style="margin-top:70px;">
     
     <div class="container" style="margin-top:100px;">
      <div id="myCarousel" class="carousel slide pointer-event" data-ride="carousel">
        <ol class="carousel-indicators">
          @forelse($iklanUtamas as $key => $iklanUtama)
          <li data-target="#myCarousel" data-slide-to="{{$loop->iteration - 1}}" class="{{ $key === 0 ? ' active' : '' }}"></li>
          @empty
          
          @endforelse
          </ol>
        <div class="carousel-inner">
          @forelse($iklanUtamas as $key => $iklanUtama)
          <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
            <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title><img src="img/he.jpg" alt=""></title><rect width="100%" height="100%" fill="#777"/><img src="img/he.jpg" alt=""><text x="50%" y="50%" fill="#777" dy=".3em"> </text></svg> -->
            <a href="{{route('user.iklan_utama.detail', ['iklan_utama' => $iklanUtama])}}">
              <img src="{{asset('img/iklan_utama/'. $iklanUtama->foto_utama )}}" class="bd-placeholder-img" width="100%" height="auto"  alt="">
            </a>
            <div class="container">
              <div class="carousel-caption" sty>
              </div>
            </div>
          </div>
          @empty

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
     </div>
   </main>

   <!-- Penawaran Kami -->
   <div class="album">
     
     <div class="container">
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
                            <h6 class="text-danger" style="margin: 0 auto;">
                            {{ Illuminate\Support\Str::limit($penawaran->penawaran, 16, '...') }}
                            </h6>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start align-items-end">
                        @if($penawaran->diskon == '0')
                        <h5 style="">Rp {{ number_format($penawaran->harga, 0, ',', '.') }} </h5>
                        @else
                        <h6 style="color:grey; text-decoration: line-through;">{{$penawaran->harga}}</h6>&nbsp;
                        <h5 style="color:#28a745;"> Rp {{ number_format(intval($penawaran->harga - ($penawaran->harga * $penawaran->diskon / 100)), 0, ',', '.')}}</h5>
                        @endif
                    </div>
                </div>
            </div>

         </div>
         @empty
         @endforelse
       </div>
     </div>
     </div>
   </div>



   <!-- List Produk -->
 <div class="album py-5 bg-light">
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
             <h6 style="">Rp. {{ number_format($barang->harga, 0, ',', '.') }}</h6>
           </div>
         </div>
       </div>
       @empty
       @endforelse
     </div>
   </div>
   </div>
 </div>

   <!-- Keunggulan -->
 <div class="container marketing">
   <!-- Three columns of text below the carousel -->
   <h3 style="margin: 2% 0 7% 0;">Keunggulan</h3>
   <div class="row">
     
     <div class="col-lg-4">
       <img src="{{asset('user/img/efisien.png')}}" alt="" width="100%">
       <h2>Efisien</h2>
       <p>Mudah dalam proses pembelian, mudah berkomunikasi 
        dengan admin, dan tidak menyulitkan pembeli</p>
     </div><!-- /.col-lg-4 -->
     <div class="col-lg-4">
     <img src="{{asset('user/img/original.png')}}" alt="" width="100%">
        <h2>Orisinil</h2>
       <p>Produk asli karya siswa SMKN 1 Purwosari, meningkatkan 
        kompetensi siswa, dan mencintai produk dalam negeri </p>
     </div><!-- /.col-lg-4 -->
     <div class="col-lg-4">
        <img src="{{asset('user/img/high-quality.png')}}" alt="" width="100%">
       
        <h2>High Quality</h2>
       <p>Produk yang dijual dijamin memiliki kualitas yang sangat 
        tinggi karena dibuat dengan ketekunan dan keuletan </p>
     </div><!-- /.col-lg-4 -->
   </div><!-- /.row -->
 </div>

 @endsection