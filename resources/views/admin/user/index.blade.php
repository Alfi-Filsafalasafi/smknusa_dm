@extends('admin.layouts.master')
@section('user','active')

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
        <div class="col-lg-6 col-md-6 col-sm-12 col-6 d-flex align-items-center ">
            <strong>Data User</strong>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-6 d-flex align-items-end justify-content-end">
            <a href="{{ route('user.create') }}" class="btn btn-sm btn-success px-3">+</a>
        </div>
    </div>
    <div class="row-g-4 mt-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    @forelse ($users as $user)
                    <tbody>
                        <tr>
                            <th class="align-middle" scope="row">{{$loop->iteration}}</th>
                            <td class="align-middle"><img src="{{asset('img/user/'.$user->foto)}}" style="max-width:60px;" alt=""></td>
                            <td class="align-middle">{{$user->name}}</td>
                            <td class="align-middle">{{$user->nip}}</td>
                            <td class="align-middle">{{$user->email}}</td>
                            @if($user->jurusan == '')
                            <td class="align-middle">Super Admin</td>
                            @else
                            <td class="align-middle">{{$user->jurusan}}</td>
                            @endif
                            <td class="align-middle">
                                <div class="btn-group">
                                    <form method="POST" action="{{ route('user.delete', $user->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <a href="{{route('user.edit',['user'=>$user->id])}}" class="btn btn-warning btn-sm" style="margin: 2px;"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('user.delete',['user'=>$user->id])}}" class="btn btn-danger btn-sm show_confirm" style="margin: 2px;"><i class="fa fa-trash"></i></a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @empty
                        <div class="text-center">Tidak ada data...</div>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
@endsection