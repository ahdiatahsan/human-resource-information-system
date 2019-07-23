<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>HRIS | @yield('title')</title>

  <!-- Custom fonts for this template-->
  <link rel="icon" href="img/logo.png">
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center my-4" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="/img/logo.png" alt="logo_HRIS" width="50" height="50" class="d-inline-block align-top">
        </div>
        <div class="sidebar-brand-text mx-3">HRIS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      @if (Auth::user() && Auth::user()->role != 'karyawan')<!-- Tampilkan jika role memenuhi -->
      
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('karyawan', 'karyawan_input') ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseKaryawan" aria-expanded="true" aria-controls="collapseTwo">
          <i class="far fa-address-card"></i>
          <span>Karyawan</span>
        </a>
        <div id="collapseKaryawan" class="collapse {{ request()->is('karyawan', 'karyawan_input') ? 'show' : '' }}" aria-labelledby="headingKaryawan" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ request()->is('karyawan') ? 'active' : '' }}" 
              href="{{ route('karyawan') }}">Data Karyawan</a>
            <a class="collapse-item {{ request()->is('karyawan_input') ? 'active' : '' }}" 
              href="{{ route('karyawan2') }}">Input Data Karyawan</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('golongan', 'golongan_input') ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseGolongan" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-layer-group"></i>
          <span>Golongan</span>
        </a>
        <div id="collapseGolongan" class="collapse {{ request()->is('golongan', 'golongan_input') ? 'show' : '' }}" aria-labelledby="headingGolongan" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ request()->is('golongan') ? 'active' : '' }}" 
              href="{{ route('golongan') }}">Data Golongan</a>
            <a class="collapse-item {{ request()->is('golongan_input') ? 'active' : '' }}" 
              href="{{ route('golongan2') }}">Input Data Golongan</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('divisi', 'divisi_input') ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseDivisi" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-sitemap"></i>
          <span>Divisi</span>
        </a>
        <div id="collapseDivisi" class="collapse {{ request()->is('divisi', 'divisi_input') ? 'show' : '' }}" aria-labelledby="headingDivisi" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ request()->is('divisi') ? 'active' : '' }}" 
              href="{{ route('divisi') }}">Data Divisi</a>
            <a class="collapse-item {{ request()->is('divisi_input') ? 'active' : '' }}" 
              href="{{ route('divisi2') }}">Input Data Divisi</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      @endif

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('lembur', 'lembur_input') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLembur" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-cloud-moon"></i>
          <span>Lembur</span>
        </a>
        <div id="collapseLembur" class="collapse {{ request()->is('lembur', 'lembur_input') ? 'show' : '' }}" aria-labelledby="headingLembur" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ request()->is('lembur') ? 'active' : '' }}" 
              href="{{ route('lembur') }}">Data Lembur</a>

            @if (Auth::user() && Auth::user()->role == 'karyawan')<!-- Tampilkan jika role memenuhi -->
            <a class="collapse-item {{ request()->is('lembur_input') ? 'active' : '' }}" 
              href="{{ route('lembur2') }}">Input Data Lembur</a>
            @endif
          </div>
        </div>
      </li>
 
      <!-- Divider -->
      <hr class="sidebar-divider">

      @if (Auth::user() && Auth::user()->role == 'superadmin') <!-- Tampilkan jika role memenuhi -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('user', 'user_input') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHrd" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-users"></i>
          <span>Data User</span>
        </a>
        <div id="collapseHrd" class="collapse {{ request()->is('user', 'user_input') ? 'show' : '' }}" aria-labelledby="headingHrd" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ request()->is('user') ? 'active' : '' }}" 
              href="{{ route('user') }}">Data User</a>
            <a class="collapse-item {{ request()->is('user_input') ? 'active' : '' }}" 
              href="{{ route('user2') }}">Input Data User</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      @endif

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information --> 
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-lg-inline text-gray-600 small">{{ Auth::user()->email }} </span>
                <img class="img-profile rounded-circle" 
                src="https://images.vexels.com/media/users/3/137047/isolated/preview/5831a17a290077c646a48c4db78a81bb-user-profile-blue-icon-by-vexels.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{ route('profil') }}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            @include('layouts.partials._alert')

            @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <footer class="sticky-footer bg-white shadow">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Human Resource Information System 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logout Akun ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" jika ingin mengakhiri sesi.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
              <i class="fas fa-times"></i> Cancel
          </button>
          <a class="btn btn-danger" href="{{ route('logout') }}" 
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            {{ __('Logout') }}> <i class="fas fa-sign-out-alt"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/vendor/chart.js/Chart.min.js"></script>
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="/js/demo/datatables-demo.js"></script>

  <!-- Page level custom scripts -->
  <script src="/js/demo/chart-area-demo.js"></script>
  <script src="/js/demo/chart-pie-demo.js"></script>

  <script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
  </script>

</body>

</html>
