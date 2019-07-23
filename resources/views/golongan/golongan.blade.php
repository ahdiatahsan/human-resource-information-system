@extends('layouts.master')

@section('title')
  Data Golongan
@endsection

@php
  $no = 1;
@endphp

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Golongan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm" id="myTable" width="100%" cellspacing="0">
        <thead class="table-dark text-white">
          <tr>
            <th>No.</th>
            <th>Nama Golongan</th>
            <th>Ditambahkan Pada</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach($golongans as $golongan)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $golongan->nama_golongan }}</td>
            <td>{{ $golongan->created_at }}</td>
            <td style="text-align: center; width: 10rem;">
                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#DeleteModal-{{ $golongan->id }}">
                  <i class="fas fa-trash"></i> Hapus
                </a>
                <a href="{{ url('/golongan_edit/'.$golongan->id) }}" class="btn btn-primary btn-sm">
                  <i class="fa fa-pencil-alt"></i> Edit
                </a>
            </td>
          </tr>
          <!-- Delete Modal-->
          <div class="modal fade" id="DeleteModal-{{ $golongan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data Golongan ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Seluruh data yang bersangkutan dengan golongan akan ikut terhapus.</div>
                <div class="modal-footer">
                  <form method="GET" action="{{ route('golongan_delete', $golongan->id) }}" tabindex="-1">
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
