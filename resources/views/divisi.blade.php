@extends('layouts.master')

@section('title')
  Data Divisi
@endsection

@php
  $no = 1;
@endphp

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Divisi</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm" id="myTable" width="100%" cellspacing="0">
        <thead class="table-dark text-white">
          <tr>
            <th>No.</th>
            <th>Nama Divisi</th>
            <th>Ditambahkan Pada</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach($divisis as $divisi)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $divisi->nama_divisi }}</td>
            <td>{{ $divisi->created_at }}</td>
            <td style="text-align: center; width: 10rem;">
                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#DeleteModal-{{ $divisi->id }}">
                  <i class="fas fa-trash"></i> Hapus
                </a>
                <a href="{{ url('/divisi_edit/'.$divisi->id) }}" class="btn btn-primary btn-sm">
                  <i class="fa fa-pencil-alt"></i> Edit
                </a>
            </td>
          </tr>
          <!-- Delete Modal-->
          <div class="modal fade" id="DeleteModal-{{ $divisi->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data Divisi ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Seluruh data yang bersangkutan dengan divisi ini akan ikut terhapus.</div>
                <div class="modal-footer">
                  <form method="GET" action="{{ route('divisi_delete', $divisi->id) }}" tabindex="-1">
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
