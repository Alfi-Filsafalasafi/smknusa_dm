@extends('user.layouts.master')

@section('title')
    Home
@endsection

@section('produkActive', 'active')
@section('produk', 'text-success')

@section('content')
<main role="main" style="margin-top:140px;">
<div class="container-fluid pt-4"> 
    <div class="row justify-content-center  ">
        <div class="col-lg-10">
            <div class="row mt-2">
                <div class="col-sm-12 col-lg-6">
                    <img src="{{asset('img/iklan_utama/'.$iklan_utama->foto_utama)}}" class="position-relative rounded w-100" alt="">
                    <div class="row g-4 mt-1 justify-content-center">
                        <div class="col-5 col-sm-4">
                            <img src="{{asset('img/iklan_utama/'.$iklan_utama->foto1)}}" class="position-relative rounded w-100" alt="">
                        </div>
                        <div class="col-5 col-sm-4">
                            <img src="{{asset('img/iklan_utama/'.$iklan_utama->foto2)}}" class="position-relative rounded w-100" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                <table class="mt-2">
                    <tr>
                        <th width="25%">Nama Iklan</th>
                        <th width="3%"> :</th>
                        <td>{{$iklan_utama->nama}}</td>
                    </tr>
                    <tr>
                        <td class="pb-2"></td>
                    </tr>
                    <tr>
                        <th class="align-top">Keterangan</th>
                        <th class="align-top">:</th>
                        <td><div style="white-space: pre-wrap;">{{ $iklan_utama->keterangan }}</div></td>
                    </tr>
                    <tr>
                        <td class="pb-2"></td>
                    </tr>
                @if($iklan_utama->diskon == '' | $iklan_utama->diskon == 0)
                    <tr>
                        <td colspan="3">
                            <h1 class="display-6 harga">Rp.{{$iklan_utama->harga}}</h1>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="3">
                            <div class="inline-container">
                                <h1 class="display-6 strikethrough">{{$iklan_utama->harga}}</h1>
                                <h1 class="display-6 ms-2 harga">Rp.{{ intval($iklan_utama->harga - ($iklan_utama->harga * $iklan_utama->diskon / 100))}}</h1>
                                <div class="bg-success ms-2 px-1 text-white">-{{$iklan_utama->diskon}}%</div>
                            </div>
                        </td>
                    </tr>
                @endif
                        <tr>
                            <th>Penawaran</th>
                            <th>:</th>
                            <td>{{$iklan_utama->penawaran!='' ? $iklan_utama->penawaran : 'Tidak ada'}}</td>
                        </tr>
                        <tr>
                            <th>Tipe</th>
                            <th>:</th>
                            <td>{{$iklan_utama->type}}</td>
                        </tr>
                </table>
                <a href="https://wa.me/62{{$iklan_utama->narahubung_wa}}" class="btn btn-success mt-4"><i class="fab fa-whatsapp mr-2"></i>Beli Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection