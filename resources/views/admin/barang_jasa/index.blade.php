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
        <i class="fa fa-exclamation-circle me-2"></i>{{session()->get('hapus')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('ubah'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>{{session()->get('ubah')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row g-4 justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-6 d-flex align-items-center">
            <strong>Barang dan Jasa</strong>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-6 d-flex align-items-end justify-content-end">
            <a href=""><small class="me-3">Lihat hasil di website</small></a>
        @if (count($barang_jasa) < 3)
            <a href="{{ route('barang_jasa.create') }}" class="btn btn-sm btn-success px-3">+</a>
        @else
            <button class="btn btn-sm btn-success px-3" disabled>+</button>
        @endif
        </div>
    </div>
    
    <div class="row g-4 mt-2">
        @forelse ($barang_jasa as $barangJasa)
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded p-4">
                <a href="{{route('barang_jasa.detail', $barangJasa->id)}}"><img src="{{asset('img/barang_jasa/'.$barangJasa->foto_utama)}}" class="position-relative rounded w-100 h-100" alt=""></a>
            </div>
        </div>
        @empty
            <div class="text-center">Tidak ada data...</div>
        @endforelse
    </div>
</div>
@endsection