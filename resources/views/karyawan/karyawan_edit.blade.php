@extends('layouts.master')

@section('title')
    Edit Data Karyawan
@endsection

@section('content')
<div class="container-fluid mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Form Edit Data Karyawan
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('/karyawan/edit/'.$karyawan->id) }}">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $karyawan->nama }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nip" name="nip" value="{{ $karyawan->nip }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $karyawan->alamat }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Golongan</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="golongan">
                            @foreach ($golongans as $golongan)
                                <option value="{{ $golongan->id }}" @if($golongan->id === $karyawan->golongan_id) selected @endif> 
                                    {{ $golongan->nama_golongan }} 
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Divisi</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="divisi">
                            @foreach ($divisis as $divisi)
                                <option value="{{ $divisi->id }}" @if($divisi->id === $karyawan->divisi_id) selected @endif> 
                                    {{ $divisi->nama_divisi }} 
                                </option>
                            @endforeach
                        </select>
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
                    <button type="reset" class="btn btn-danger">
                        <i class="fas fa-recycle"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Kirim
                    </button>
            </form>
        </div>
    </div>
</div>
@endsection
