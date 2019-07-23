@extends('layouts.master')

@section('title')
    Profil
@endsection

@section('content')

@if(Auth::user() && Auth::user()->role == 'karyawan')
<div class="container-fluid mx-auto">
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            My Profile
        </div>
        <div class="card-body">
            <form method="" action="">
                {{ csrf_field() }}
                @foreach ($profil as $profil)
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" disabled value="{{ $profil->nama }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="" disabled value="{{ $profil->nip }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" disabled value="{{ $profil->alamat }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Golongan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" disabled value="{{ $profil->get_dataGolongan->nama_golongan }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Divisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" disabled value="{{ $profil->get_dataDivisi->nama_divisi }}">
                    </div>
                </div>
                @endforeach
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="" disabled value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group float-right">
                    <a href="{{ route('profil2') }}" class="btn btn-primary" role="button" aria-pressed="true">
                        <i class="fas fa-pencil-alt"></i> Edit Profil
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>  
@else
<div class="container-fluid mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            My Profile
        </div>
        <div class="card-body">
            <form method="" action="">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="" disabled value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" disabled value="{{ $user->role }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Ditambahkan Pada</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" disabled value="{{ $user->created_at }}">
                    </div>
                </div>
                <div class="form-group float-right">
                    <a href="{{ route('profil2') }}" class="btn btn-primary" role="button" aria-pressed="true">
                        <i class="fas fa-pencil-alt"></i> Edit Profil
                    </a>
                </div>
            </form>
        </div>
    </div>
</div> 
@endif

@endsection
