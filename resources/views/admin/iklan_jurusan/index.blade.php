@extends('admin.layouts.master')
@section('iklanJurusan','active')

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
            <strong>Iklan Jurusan</strong>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-6 d-flex align-items-end justify-content-end">
            <a href="{{route('user.produk.jurusan', ['id_jurusan' => $jurusan->id, 'nama_jurusan' => $jurusan->nama])}}" target="_blank"><small class="me-3">Lihat hasil di website</small></a>
        @if (count($iklan_jurusan) < 3)
            <a href="{{ route('iklan_jurusan.create') }}" class="btn btn-sm btn-success px-3">+</a>
        @else
            <button class="btn btn-sm btn-success px-3" disabled>+</button>
        @endif
        </div>
    </div>
    
    <div class="row g-4 mt-2">
        @forelse ($iklan_jurusan as $iklanJurusan)
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded p-4">
                <a href="{{route('iklan_jurusan.detail', $iklanJurusan->id)}}"><img src="{{asset('img/iklan_jurusan/'.$iklanJurusan->foto_utama)}}" class="position-relative rounded w-100 h-100" alt=""></a>
            </div>
        </div>
        @empty
            <div class="text-center">Tidak ada data...</div>
        @endforelse
    </div>
</div>
@endsection