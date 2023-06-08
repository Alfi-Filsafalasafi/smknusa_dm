@extends('admin.layouts.master')
@section('iklanUtama','active')

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
            <strong>Iklan Utama > {{$iklan_utama->nama}}</strong>
        </div>
        <div class="col-sm-6 d-flex align-items-end justify-content-end">
            <a href="{{ route('iklan_utama.edit', $iklan_utama->id) }}" class="btn btn-sm btn-warning me-3"><i class="far fa-edit"></i></a>
            <form method="POST" action="{{ route('iklan_utama.delete', $iklan_utama->id) }}">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <a href="{{ route('iklan_utama.delete', $iklan_utama->id) }}" class="btn btn-sm btn-danger show_confirm"><i class="fas fa-trash-alt"></i></a>

            </form>
        </div>
    </div>
    
    <div class="row g-4 mt-2">
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
                <th width="25%">Nama Produk</th>
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
                        <div class="bg-primary ms-2 px-1 text-white">-{{$iklan_utama->diskon}}%</div>
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
        </div>
    </div>
</div>
@endsection