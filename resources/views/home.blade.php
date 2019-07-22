@extends('layouts.master')

@section('title')
    Home
@endsection

@php
  $JumlahKaryawan = App\Karyawan::all() -> count();
  $JumlahLembur = App\Lembur::all() -> count();
  $JumlahLemburPending = App\Lembur::where('status', 'pending') -> count();
@endphp

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center mb-4">
  <p>
    <h1 class="h3 mb-0 text-gray-800 px-1">Dashboard</h1>
    <sub class="mb-0 text-gray-800 px-1">Control Panel</sub>
  </p>
</div>

  <!-- Content Row -->
  <div class="row">

    <!-- Content Column -->
    <div class="col-lg-4 mb-4">

      <!-- Approach -->
      <div class="card shadow mb-4">
        <div class="card border-left-danger shadow h-100 py-4">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Karyawan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $JumlahKaryawan }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-danger-300"></i>
            </div>
          </div>
        </div>
        </div>
      </div>

      <!-- Approach -->
      <div class="card shadow mb-4">
        <div class="card border-left-success shadow h-100 py-4">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Data Lembur</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $JumlahLembur }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-cloud-moon fa-2x text-success-300"></i>
            </div>
          </div>
        </div>
        </div>
      </div>

      <!-- Approach -->
      <div class="card shadow mb-4">
        <div class="card border-left-warning shadow h-100 py-4">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Request Lembur</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $JumlahLemburPending }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-hourglass-half fa-2x text-warning-300"></i>
            </div>
          </div>
        </div>
        </div>
      </div>

    </div>

    <!-- Content Column -->
    <div class="col-lg-8 mb-4">
      <!-- Illustrations -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Human Resource Information System</h6>
        </div>
        <div class="card-body">
          <div class="text-center">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 23rem;" src="img/undraw_posting_photo.svg" alt="Human Resource Image">
          </div>
          <p class="text-center mt-3">Anda tidak perlu lagi meminta data dari cabang-cabang yang jauh, atau dari toko yang berbeda 
            untuk membuat report konsolidasi. Data karyawan dapat diakses oleh pihak manajemen atau departemen HR 
            dengan cepat.
          </p>
        </div>
      </div>
    </div>

  </div>

@endsection
