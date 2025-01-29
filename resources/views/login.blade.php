<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | E-Cuti</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/adminlte.min.css')}}">
  <!-- toastr -->
  <link rel="stylesheet" href="{{asset('assets/lte/plugins/toastr/toastr.min.css')}}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="text-center">
      <img src="{{ asset('assets/img/izin-login.png') }}" class="img-fluid" alt="">
    </div>
    <div class="card-body">
      <form action="{{route('actionLogin')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
            @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="admin">
            @error('password')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>

        <div class="col-3 mx-auto">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
          <!-- /.col -->
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('assets/lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/lte/dist/js/adminlte.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('assets/lte/plugins/toastr/toastr.min.js') }}"></script>


<script>
  $(document).ready(function() {
    @if(session('error'))
      toastr.error("{{ session('error') }}");
    @endif
  });
</script>


</body>
</html>
