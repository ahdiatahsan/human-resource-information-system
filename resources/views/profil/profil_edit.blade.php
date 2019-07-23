@extends('layouts.master')

@section('title')
    Edit Profil
@endsection

@section('content')

@if(Auth::user() && Auth::user()->role == 'karyawan')
<div class="container-fluid mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            My Profile
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('profil_update', ['id' => $user->id]) }}">
                {{ csrf_field() }}
                @foreach ($profil as $profil)
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $profil->nama }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $profil->alamat }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $profil->get_dataUser->email }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </div> 
                @endforeach
                @if ($errors->any())
                <div class="col-sm-12 p-r-0 p-l-0 p-b-0">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul style="margin-bottom:0!important;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                <div class="form-group float-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Simpan
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
            <form method="POST" action="{{ route('profil_update', ['id' => $user->id]) }}">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Ubah Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </div>
                @if ($errors->any())
                <div class="col-sm-12 p-r-0 p-l-0 p-b-0">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul style="margin-bottom:0!important;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                <div class="form-group float-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 
@endif

@endsection

