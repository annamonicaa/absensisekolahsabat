<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Absensi Sekolah Sabat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
  <link href="/css/app.css" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card shadow card-outline">
    <div class="card-header text-center">
      <img style="width: 2.5em; height: auto" src="{{asset('storage/logo.png')}}" alt="">
      <div class="h3">Absensi Sekolah Sabat</div>
    </div>
    <div class="card-body">

      <p class="login-box-msg h5">Login</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
            <div class="form-floating">
                <input type="username" class="form-control" @error('username') is-invalid @enderror id="username" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                <label for="username">Username</label>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="form-floating">
                <input type="password" class="form-control" @error('password') is-invalid @enderror id="password" placeholder="Password" name="password" value="{{ old('username') }}" required autocomplete="current-password">
                <label for="password">Password</label>
                @if (session('error'))
                <div class="mt-3 alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ session('error') }}
                </div>
                @endif
            </div>
        </div><br>

        {{-- <div class="input-group mb-3">
            <input type="password" class="form-control" @error('password') is-invalid @enderror id="password" placeholder="Password" name="password" value="{{ old('username') }}" required autocomplete="current-password">
            @if (session('error'))
            <div class="mt-3 alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                {{ session('error') }}
            </div>
            @endif
        </div> --}}

        <div class="text-center mt-2 mb-3">
            <button type="submit" class="btn btn-block btn-custom">Login</button> 
        </div>
                    
        
    
     </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
