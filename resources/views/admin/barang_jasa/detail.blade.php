@extends('admin.layouts.master')
@section('barangJasa','active')

@section('content')
<div class="container-fluid pt-4 px-4">
    @if(session()->has('tambah'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>{{session()->get('tambah')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('hapus'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>{{session()->get('tambah')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row g-4">
        <div class="col-sm-6 d-flex">
            <strong>Barang dan Jasa > {{$barang_jasa->nama}}</strong>
        </div>
        <div class="col-sm-6 d-flex align-items-end justify-content-end">
            <a href="{{ route('barang_jasa.edit', $barang_jasa->id) }}" class="btn btn-sm btn-warning me-3"><i class="far fa-edit"></i></a>
            <form method="POST" action="{{ route('barang_jasa.delete', $barang_jasa->id) }}">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <a href="{{ route('barang_jasa.delete', $barang_jasa->id) }}" class="btn btn-sm btn-danger show_confirm"><i class="fas fa-trash-alt"></i></a>

            </form>
        </div>
    </div>
    
    <div class="row g-4 mt-2">
        <div class="col-sm-12 col-lg-6">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-6 col-sm-12">
                <img src="{{asset('img/barang_jasa/'.$barang_jasa->foto_utama)}}" class="position-relative rounded w-100" alt="">
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
        <div class="col-sm-12 col-lg-6">
           <table class="mt-2">
            <tr>
                <th width="25%">Nama Produk</th>
                <th width="3%"> :</th>
                <td>{{$barang_jasa->nama}}</td>
            </tr>
            <tr>
                <td class="pb-2"></td>
            </tr>
            <tr>
                <th class="align-top">Keterangan</th>
                <th class="align-top">:</th>
                <td><div style="white-space: pre-wrap;">{{ $barang_jasa->deskripsi }}</div></td>
            </tr>
            <tr>
                <td class="pb-2"></td>
            </tr>
           @if($barang_jasa->diskon == '' | $barang_jasa->diskon == 0)
            <tr>
                <td colspan="3">
                    <h1 class="display-6 harga">Rp {{ number_format($barang_jasa->harga, 0, ',', '.')}}</h1>
                </td>
            </tr>
           @else
            <tr>
                <td colspan="3">
                    <div class="inline-container">
                        <h1 class="display-6 strikethrough">{{ number_format($barang_jasa->harga, 0, ',', '.') }}</h1>
                        <h1 class="display-6 ms-2 harga">Rp {{ number_format(intval($barang_jasa->harga - ($barang_jasa->harga * $barang_jasa->diskon / 100)), 0, ',', '.' )}}</h1>
                        <div class="bg-primary ms-2 px-1 text-white">-{{$barang_jasa->diskon}}%</div>
                    </div>
                </td>
            </tr>
           @endif
                <tr>
                    <th>Penawaran</th>
                    <th>:</th>
                    <td>{{$barang_jasa->penawaran!='' ? $barang_jasa->penawaran : 'Tidak ada'}}</td>
                </tr>
                <tr>
                    <th>Tipe</th>
                    <th>:</th>
                    <td>{{$barang_jasa->type}}</td>
                </tr>
                <tr>
                    <th>Satuan</th>
                    <th>:</th>
                    <td>{{$barang_jasa->satuan}}</td>
                </tr>
                <tr>
                    <th>Narahubung WA</th>
                    <th>:</th>
                    <td>{{$barang_jasa->narahubung_wa}}</td>
                </tr>
                <tr>
                    <th>Tipe</th>
                    <th>:</th>
                    <td>{{$barang_jasa->type}}</td>
                </tr>
                <tr>
                    <th>Link Portfolio</th>
                    <th>:</th>
                    <td>{{$barang_jasa->link_portfolio}}</td>
                </tr>
           </table>
        </div>
    </div>
</div>
@endsection