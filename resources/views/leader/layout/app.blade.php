<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') | E-Cuti</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" {{asset('assets/lte/plugins/fontawesome-free/css/all.min.css')}} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href=" {{asset('assets/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}} ">
  <!-- iCheck -->
  <link rel="stylesheet" href=" {{asset('assets/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}} ">
  <!-- JQVMap -->
  <link rel="stylesheet" href=" {{asset('assets/lte/plugins/jqvmap/jqvmap.min.css')}} ">
  <!-- Theme style -->
  <link rel="stylesheet" href=" {{asset('assets/lte/dist/css/adminlte.min.css')}}">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{asset('assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href=" {{asset('assets/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}} ">
  <!-- Daterange picker -->
  <link rel="stylesheet" href=" {{asset('assets/lte/plugins/daterangepicker/daterangepicker.css')}} ">
  <!-- summernote -->
  <link rel="stylesheet" href=" {{asset('assets/lte/plugins/summernote/summernote-bs4.min.css')}} ">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/lte/dist/img/AdminLTELogo.png ') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Dashboard</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn">Logout</button>
          </form>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link" >
      <img src="{{ asset('assets/lte/dist/img/AdminLTELogo.png ') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;" >
      <span class="brand-text font-weight-light">Izin Online App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      {{-- <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  @yield('content')

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/lte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('asset/lte/plugins/chartjs/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/lte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('assets/lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets/lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/lte/dist/js/adminlte.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('assets/lte/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/lte/dist/js/pages/dashboard.js')}}"></script>

<script>
  $(function () {
    $(".data-table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>