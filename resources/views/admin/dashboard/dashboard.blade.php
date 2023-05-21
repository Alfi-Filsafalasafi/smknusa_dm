@extends('admin.layouts.master')
@section('dashboard','active')

@section('content')
    <!-- Akumulasi Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-th fa-3x text-primary"></i>
                            <div class="ms-3">
                                @if(Auth::user()->hak_akses == 'Super Admin')
                                    <p class="mb-2">Iklan Utama</p>
                                    <h6 class="mb-0">{{$jmlhIklanUtama}}</h6>
                                @else
                                    <p class="mb-2">Iklan Utama</p>
                                    <h6 class="mb-0">{{$jmlhIklanJurusan}}</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-solid fa-user fa-3x text-primary"></i>
                            <div class="ms-3">
                            <p class="mb-2">Jumlah User</p>
                                @if(Auth::user()->hak_akses == 'Super Admin')
                                    
                                    <h6 class="mb-0">{{$jmlhUser}}</h6>
                                @else
                                    <h6 class="mb-0">{{$jmlhUserJurusan}}</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-weight-hanging fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Barang</p>
                                @if(Auth::user()->hak_akses == 'Super Admin')
                                    <h6 class="mb-0">{{$jmlhBarang ?? 0}}</h6>
                                @else
                                    <h6 class="mb-0">{{$jmlhBarangJurusan->jumlah_produk ?? 0}}</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fab fa-servicestack fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Jasa</p>
                                @if(Auth::user()->hak_akses == 'Super Admin')
                                <h6 class="mb-0">{{$jmlhJasa}}</h6>
                                @else
                                <h6 class="mb-0">{{$jmlhBarangJurusan->jumlah_jasa ?? 0}}</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Akumulasi End -->
    <!-- Barang di masing-masing jurusan -->
        <div class="container-fluid pt-4 px-4">
            @if(Auth::user()->hak_akses == 'Super Admin')
            <h6 class="my-4">List Barang dan Jasa</h6>
            <div class="row g-4">
                @forelse($jmlhProdukJasa as $item)
                <div class="col-sm-6 col-xl-2">
                    <strong>{{$item->nama}}</strong>
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <div class="">
                                <p class="mb-2">Produk</p>
                                <h6 class="mb-0">{{$item->jumlah_produk ?? 0}}</h6>
                            </div>
                            <div class="">
                                <p class="mb-2">Jasa</p>
                                <h6 class="mb-0">{{$item->jumlah_jasa ?? 0}}</h6>
                            </div>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
            @else
            @endif
        </div>
    <!-- Barang di masing-masing jurusan edn -->
@endsection