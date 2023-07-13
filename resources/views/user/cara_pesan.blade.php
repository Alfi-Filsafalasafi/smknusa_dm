@extends('user.layouts.master')

@section('title')
    Cara Pesan
@endsection

@section('caraActive', 'active')
@section('cara', 'text-success')
@section('content')

   <!-- Keunggulan -->
 <div class="container marketing" style="margin-top:140px;">
   <!-- Three columns of text below the carousel -->
   <h3 class="text-center">Bagaimana cara pesan produk kami ?</h3>
   <div class="row mt-5">
     
     <div class="col-lg-4">
        <img src="{{asset('user/img/lihat-produk.png')}}" alt="" width="100%">
        <h2>Lihat Produk</h2>
       <p>Untuk melihat detail produk yang kami jual, Anda bisa melihat langsung melalui 
        beranda pada website kami atau juga bisa melihat produk kami berdasarkan jurusan yang telah disediakan</p>
     </div><!-- /.col-lg-4 -->
     <div class="col-lg-4">
        <img src="{{asset('user/img/beli-sekarang.png')}}" alt="" width="100%">
        <h2>Beli Sekarang</h2>
       <p>Untuk membeli produk kami, Anda dapat langsung klik link dibawah ini dan diarahkan pada nomor WhatsApp admin. 
        Disana Anda dapat berdiskusi, berbincang, dan melakukan tawar menawar dengan admin</p>
     </div><!-- /.col-lg-4 -->
     <div class="col-lg-4">
        <img src="{{asset('user/img/bayar.png')}}" alt="" width="100%">
        <h2>Pembayaran</h2>
       <p>Untuk pembayaran nanti dapat didiskusikan terlebih dahulu dengan admin, lalu dapat dilakukan sesuai kesepakatan. Pembayaran dapat dilakukan melalui transfer atau cash, uang DP atau langsung lunas, sesuai kesepakatan.</p>
       
     </div><!-- /.col-lg-4 -->
   </div><!-- /.row -->
 </div>

    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mx-auto ">
                    <img src="{{asset('user/img/cara-pesan.png')}}" class="bd-placeholder-img" width="100%" height="100%"  alt="">
                </div>
            </div>
        </div>
    </main>

 @endsection