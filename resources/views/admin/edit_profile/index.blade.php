@extends('admin.layouts.master')
@section('editProfile','active')

@section('content')
<div class="container-fluid pt-4 px-4">
    @if(session()->has('tambah'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>{{session()->get('tambah')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row g-4">
        <div class="col-sm-6 col-md-6 col-sm-12 col-6  d-flex">
            <strong>Edit Profile</strong>
        </div>
        <div class="col-sm-6 col-md-6 col-sm-12 col-6  d-flex align-items-end justify-content-end">
            <a href="{{route('edit_profile.edit', ['user' => $user->id])}}" class="btn btn-sm btn-warning me-3"><i class="far fa-edit"></i></a>
        </div>
    </div>
    
    
    <div class="bg-light rounded p-4 mt-3">
        <div class="row g-4 justify-content-evenly">
            <div class="col-sm-4 col-lg-2 d-flex justify-content-center align-items-center">
                <img src="{{asset('img/user/'.$user->foto)}}" class="position-relative rounded" style="height:128px;" alt="">
            </div>
            <div class="col-sm-8 col-lg-8">
                <table class="">
                    <tr>
                        <th width="45%">NIP</th>
                        <th width="6%"> :</th>
                        <td>{{$user->nip}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th>No Handphone</th>
                        <th>:</th>
                        <td>{{$user->no_hp}}</td>
                    </tr>
                    <tr>
                        <th>No Whatsapp </th>
                        <th>:</th>
                        <td>+62{{$user->no_wa}}</td>
                    </tr>
                    <tr>
                        <th>Hak Akses </th>
                        <th>:</th>
                        <td>{{$user->hak_akses}}</td>
                    </tr>
                    <tr>
                        <td class="pb-2"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection