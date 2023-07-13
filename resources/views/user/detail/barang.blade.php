@extends('user.layouts.master')

@section('title')
    Detail Produk
@endsection

@section('produkActive', 'active')
@section('produk', 'text-success')

@section('content')
<main role="main" style="margin-top:70px;">
    <div class="container-fluid pt-4 px-4">
        
        <div class="row g-4 mt-2">
            <div class="col-sm-12 col-lg-6">
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-6 col-sm-6">
                    <img src="{{asset('img/barang_jasa/'.$barang_jasa->foto_utama)}}" class="position-relative rounded img-fluid" alt="">
                    </div>
                </div>
                <div class="row g-4 mt-1 justify-content-center">
                    <div class="col-5 col-sm-4">
                        <img src="{{asset('img/barang_jasa/'.$barang_jasa->foto1)}}" class="position-relative rounded w-100" alt="">
                    </div>
                    <div class="col-5 col-sm-4">
                        <img src="{{asset('img/barang_jasa/'.$barang_jasa->foto2)}}" class="position-relative rounded w-100" alt="">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 mt-5">
                <h4>{{$barang_jasa->nama}}</h4>
                <div style="white-space: pre-wrap;">{{ $barang_jasa->deskripsi }}</div>
                <h2 class="hargabarang mt-4">Rp. {{ intval($barang_jasa->harga - ($barang_jasa->harga * $barang_jasa->diskon / 100))}}</h2>
                @if($barang_jasa->diskon != '0')
                <div class="inline-container">
                    <div class="bg-danger ms-2 px-1 text-white">-{{$barang_jasa->diskon}}%</div>
                    <div class="strikethrough"><b>Rp. {{$barang_jasa->harga}}</b></div>
                </div>
                @endif
                @if($barang_jasa->penawaran != '')
                    <h4 class="hargabarang mt-2">{{$barang_jasa->penawaran}}</h4>
                @endif
                <div class="inline-container mt-4">
                    <span><b>Tipe :</b></span>&nbsp;
                    <span>{{$barang_jasa->type}}</span>
                </div>
                <div class="inline-container">
                    <span><b>Satuan :</b></span>&nbsp;
                    <span>{{$barang_jasa->satuan}}</span>
                </div>
                <div class="inline-container">
                    <span><b>Pengiriman :</b></span> &nbsp;
                    <span>{{$barang_jasa->pengiriman}}</span>
                </div>
                @if($barang_jasa->link_portfolio != '')
                    <div class="mt-4">
                        <a href="{{$barang_jasa->link_portfolio}}" class="text-success" target="_blank"><u>Lihat Portfolio Kami</u></a> <br>
                    </div>
                @endif
                <a href="https://wa.me/62{{$barang_jasa->narahubung_wa}}" class="btn btn-success my-4"><i class="fab fa-whatsapp mr-2"></i>Beli Sekarang</a>
            </div>
        </div>
    </div>
</main>
@endsection