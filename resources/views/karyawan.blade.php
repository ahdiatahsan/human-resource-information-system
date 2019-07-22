@extends('layouts.master')

@section('title')
    Data Karyawan
@endsection

@php
  $no = 1;
@endphp

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Karyawan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm" id="myTable" width="100%" cellspacing="0">
        <thead class="table-dark text-white">
          <tr>
            <th>No.</th>
            <th>Nama Lengkap</th>
            <th>NIP</th>
            <th>Alamat</th>
            <th>Golongan</th>
            <th>Divisi</th>
            <th>Email</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach($karyawans as $karyawan)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $karyawan->nama }}</td>
            <td>{{ $karyawan->nip }}</td>
            <td>{{ $karyawan->alamat }}</td>
            <td>{{ $karyawan->get_dataGolongan->nama_golongan }}</td>
            <td>{{ $karyawan->get_dataDivisi->nama_divisi }}</td>
            <td>{{ $karyawan->get_dataUser->email }}</td>
            <td style="text-align: center; width: 10rem;">
                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#DeleteModal-{{ $karyawan->get_dataUser->id }}">
                  <i class="fas fa-trash"></i> Hapus
                </a>
                <a href="{{ url('/karyawan_edit/'.$karyawan->id) }}" class="btn btn-primary btn-sm">
                  <i class="fa fa-pencil-alt"></i> Edit
                </a>
            </td>
          </tr>
          <!-- Delete Modal-->
          <div class="modal fade" id="DeleteModal-{{ $karyawan->get_dataUser->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data Karyawan ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Seluruh data yang bersangkutan dengan karyawan akan ikut terhapus.</div>
                <div class="modal-footer">
                  <form method="GET" action="{{ route('karyawan_delete', $karyawan->get_dataUser->id) }}" tabindex="-1">
                    {{ csrf_field() }}
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>



@endsection
