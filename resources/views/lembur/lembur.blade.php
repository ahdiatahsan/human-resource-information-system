@extends('layouts.master')

@section('title')
    Data Lembur
@endsection

@php
  $no = 1;
@endphp

@section('content')

@if(Auth::user() && Auth::user()->role == 'karyawan')
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Lembur</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm" id="myTable" width="100%" cellspacing="0">
        <thead class="table-dark text-white">
          <tr>
            <th>No.</th>
            <th>Nama Lengkap</th>
            <th>Project</th>
            <th>Modul</th>
            <th>Tanggal Lembur</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Status</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach($lemburs as $lembur)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $lembur->get_dataKaryawan->nama }}</td>
            <td>{{ $lembur->project }}</td>
            <td>{{ $lembur->modul }}</td>
            <td>{{ $lembur->tgl_lembur }}</td>
            <td>{{ $lembur->jam_mulai }}</td>
            <td>{{ $lembur->jam_selesai }}</td>
            <td>{{ $lembur->status }}</td>
            <td style="text-align: center; width: 10rem;">
              @if($lembur->status == 'pending')
              <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#DeleteModal-{{ $lembur->id }}">
                <i class="fas fa-trash"></i> Hapus
              </a>
              <a href="{{ url('/lembur_edit/'.$lembur->id) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-pencil-alt"></i> Edit
              </a>
              @else
              -
              @endif
            </td>
          </tr>
          <!-- Delete Modal-->
          <div class="modal fade" id="DeleteModal-{{ $lembur->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data Lembur ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Data lembur ini akan dihapus.</div>
                <div class="modal-footer">
                  <form method="GET" action="{{ route('lembur_delete', $lembur->id) }}" tabindex="-1">
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
@else
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Lembur</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm" id="myTable" width="100%" cellspacing="0">
        <thead class="table-dark text-white">
          <tr>
            <th>No.</th>
            <th>Nama Lengkap</th>
            <th>Project</th>
            <th>Modul</th>
            <th>Tanggal Lembur</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Status</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach($lemburs as $lembur)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $lembur->get_dataKaryawan->nama }}</td>
            <td>{{ $lembur->project }}</td>
            <td>{{ $lembur->modul }}</td>
            <td>{{ $lembur->tgl_lembur }}</td>
            <td>{{ $lembur->jam_mulai }}</td>
            <td>{{ $lembur->jam_selesai }}</td>
            <td>{{ $lembur->status }}</td>
            <td style="text-align: center; width: 9rem;">
              <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#DeleteModal-{{ $lembur->id }}">
                <i class="fas fa-trash"></i>
              </a>
              <a href="{{ url('/lembur_edit/'.$lembur->id) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-pencil-alt"></i>
              </a>
              @if($lembur->status != 'diterima')
              <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#ConfirmModal">
                <i class="fas fa-check"></i>
              </a>
              @endif
            </td>
          </tr>
          <!-- Delete Modal-->
          <div class="modal fade" id="DeleteModal-{{ $lembur->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data Lembur ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Data lembur ini akan dihapus.</div>
                <div class="modal-footer">
                  <form method="GET" action="{{ route('lembur_delete', $lembur->id) }}" tabindex="-1">
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
          <!-- Confirm Modal-->
          <div class="modal fade" id="ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Data Lembur ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="{{ route('lembur_konfirmasi', $lembur->id) }}" 
                    onclick="event.preventDefault();
                    document.getElementById('confirm-form').submit();"
                    {{ __('Konfirmasi') }}> Konfirmasi
                  </a>
                  <form id="confirm-form" action="{{ route('lembur_konfirmasi', $lembur->id) }}" method="GET" style="display: none;">
                    @csrf
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
@endif
@endsection
