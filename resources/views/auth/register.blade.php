<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page dark-mode">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h2"><b>Decision </b>Support System</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="/register" method="post">
        @csrf
        <div class="input-group {{ $errors->has('name') ? '' : 'mb-3' }}">
          <input type="text" class="form-control {{ $errors->has('name') ? 'border border-danger' : '' }}" placeholder="Full name" name="name">
          <div class="input-group-append">
            <div class="input-group-text {{ $errors->has('name') ? 'border border-danger' : '' }}">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span class="small">{{ $errors->first('name') }}</span>
        <div class="input-group {{ $errors->has('email') ? '' : 'mb-3' }} {{ $errors->has('name') ? 'mt-3' : '' }}">
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
            <div class="input-group-text" {{ $errors->has('password') ? 'border border-danger' : '' }}>
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="small">{{ $errors->first('password') }}</span>
        <div class="input-group mb-3 {{ $errors->has('password') ? 'mt-3' : '' }}">
          <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'border border-danger' : '' }}" placeholder="Retype password" name="password_confirmation">
          <div class="input-group-append">
            <div class="input-group-text {{ $errors->has('password_confirmation') ? 'border border-danger' : '' }}">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="/login" class="text-center">Have an account? Login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
