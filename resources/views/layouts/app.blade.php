<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Absensi Sekolah Sabat</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/28c9760e58.js" crossorigin="anonymous"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <script src="https://kit.fontawesome.com/28c9760e58.js" crossorigin="anonymous"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('vendor/sweetalert/sweetalert.css') }}"> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"
          integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
  <link href="/css/app.css" rel="stylesheet">
  <script src="/js/app.js" crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @guest
    @if (Route::has('login'))
    @endif
                            
    @else

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <div>{{ Auth::user()->name }}
          <i class="fas fa-angle-down"></i></div>
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <span class="dropdown-header">{{ Auth::user()->name }}</span>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @if (Auth::user()->role_id == 1)
        @php
            $home = "/admin/home";
        @endphp
    @elseif (Auth::user()->role_id == 2)
        @php
            $home = "/konferens/home";
        @endphp
    @elseif (Auth::user()->role_id == 3)
        @php
            $home = "/sec/home";
        @endphp
    @else
        @php
            $home = "/staff/home";
        @endphp
    @endif
    <a href="{{ $home }}" class="brand-link">
      <img src="{{asset('storage/logo.png')}}" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sekolah Sabat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            @if (Auth::user()->role_id == 1)
                @php
                    $home = "/admin/home";
                @endphp
            @elseif (Auth::user()->role_id == 2)
                @php
                    $home = "/konferens/home";
                @endphp
            @elseif (Auth::user()->role_id == 3)
                @php
                    $home = "/sec/home";
                @endphp
            @else
                @php
                    $home = "/staff/home";
                @endphp
            @endif

            <a href="{{ $home }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <script>console.log('Current Route:', '{{ request()->route()->getName() }}');</script>


          @if (Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
          <li class="nav-item">  
            <a href="/staff/attendance" class="nav-link">
              <i class="nav-icon far fa-calendar-check"></i>
              <p>Absensi</p>
            </a>
          </li>
          @else 
          @if (Auth::user()->role_id == 3)
            <li class="nav-item">  
              <a href="/attendance" class="nav-link">
                <i class="nav-icon fa-solid fa-user-group"></i>
                <p>Absensi</p>
              </a>
          </li>
          @endif
          @endif
          
          @if (Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
          <li class="nav-item">  
            <a href="/ukss" class="nav-link">
              <i class="nav-icon fa-solid fa-book"></i>
              <p>UKSS</p>
            </a>
          </li>
          @endif



          @if (Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
          <li class="nav-item">  
            <a href="/member" class="nav-link">
              <i class="nav-icon fa-solid fa-users-between-lines"></i>
              <p>Anggota Jemaat</p>
            </a>
          </li>
          @endif

          @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 1)
          <li class="nav-item">  
            <a href="/church" class="nav-link">
              <i class="nav-icon fa-solid fa-church"></i>
              <p>Jemaat</p>
            </a>
          </li>
          @endif

          @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 4)
          <li class="nav-item">  
            <a href="/user" class="nav-link">
              <i class="nav-icon fa-solid fa-user"></i>
              <p>User</p>
            </a>
          </li>
          {{-- @else
              @if (Auth::user()->role_id == 2)
              <li class="nav-item">  
                <a href="/user/index2" class="nav-link">
                  <i class="nav-icon fa-solid fa-user"></i>
                  <p>User</p>
                </a>
              </li>
              @endif --}}
          @endif

          @if (Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
          <li class="nav-item">  
            <a href="/ukssmem" class="nav-link">
              <i class="nav-icon fa-solid fa-list"></i>
              <p>Anggota UKSS</p>
            </a>
          </li>
          @else
          @if (Auth::user()->role_id == 3)
          <li class="nav-item">  
            <a href="sec/ukssmem/show" class="nav-link">
                <i class="nav-icon fa-solid fa-list"></i>
                <p>Anggota UKSS</p>
            </a>
          </li>
          @endif
          @endif

          @if (Auth::user()->role_id == 4)
          <li class="nav-item">  
            <a href="meeting/create" class="nav-link">
                <i class="nav-icon fa-solid fa-list"></i>
                <p>Pertemuan</p>
            </a>
          </li>
              
          @endif

          @if (Auth::user()->role_id == 2)
          <li class="nav-item">  
            <a href="triwulan/create" class="nav-link">
                <i class="nav-icon fa-solid fa-list"></i>
                <p>Pertemuan</p>
            </a>
          </li>
              
          @endif

          @if (Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
          <li class="nav-item">  
            <a href="/laporan/ukss" class="nav-link">
              <i class="nav-icon fa-solid fa-file-lines"></i>
              <p>Laporan</p>
            </a>
          </li> 
          @else
              @if (Auth::user()->role_id == 2)
                <li class="nav-item">  
                  <a href="/laporan/jemaat" class="nav-link">
                    <i class="nav-icon fa-solid fa-file-lines"></i>
                    <p>Laporan</p>
                  </a>
                </li> 
              @endif

          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  @endguest
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        

    
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <main class="py-4">
            @yield('content')
        </main>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    {{-- <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> --}}
    <!-- Default to the left -->
    {{-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. --}}
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
  @stack('javascript')
</body>
</html>
