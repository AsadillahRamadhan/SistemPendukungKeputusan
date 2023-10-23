<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page dark-mode">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h2"><b>Decision </b>Support System</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="/login" method="post">
        @csrf
        <div class="input-group {{ $errors->has('email') ? '' : 'mb-3' }}">
          <input type="email" class="form-control {{ $errors->has('email') ? 'border border-danger' : '' }}" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text {{ $errors->has('email') ? 'border border-danger' : '' }}">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="small">{{ $errors->first('email') }}</span>
        <div class="input-group {{ $errors->has('password') ? '' : 'mb-3' }} {{ $errors->has('email') ? 'mt-3' : '' }}">
          <input type="password" class="form-control {{ $errors->has('password') ? 'border border-danger' : '' }}" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text {{ $errors->has('password') ? 'border border-danger' : '' }}">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="small">{{ $errors->first('password') }}</span>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="/register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
