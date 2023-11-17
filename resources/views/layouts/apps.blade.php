<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/28c9760e58.js" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"
            integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.0/chart.min.js" integrity="sha512-RGbSeD/jDcZBWNsI1VCvdjcDULuSfWTtIva2ek5FtteXeSjLfXac4kqkDRHVGf1TwsXCAqPTF7/EYITD0/CTqw==" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.0/chart.min.js" integrity="sha512-lkEx3HSoujDP3+V+i46oZpNx3eK67QPiWiCwoeQgR1I+4kutWAuOSs3BxEUZt4U/mUfyY5uDHlypuQ1HHKVykA==" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.0/chart.min.js" integrity="sha512-RGbSeD/jDcZBWNsI1VCvdjcDULuSfWTtIva2ek5FtteXeSjLfXac4kqkDRHVGf1TwsXCAqPTF7/EYITD0/CTqw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    
</head>
<body class="bg-custom">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-custom bg-white shadow-sm">
            <div class="container-fluid">
                @guest
                {{--  --}}
                @else
                <span onclick="openNav()"><i class="p-1 mr-2 fa-solid fa-bars"></i></span>
                @endguest
                <div class="p-3">
                    <img style="width: 2.5rem; margin-right: 1em" src="{{asset('storage/logo.png')}}">
                    <a class="navbar-brand" href="{{ url('/home') }}">Sekolah Sabat</a>
                </div>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    



                    <!-- Right Side Of Navbar -->
                    @guest
                        @if (Route::has('login'))
                        {{-- <ul class="navbar-nav ms-auto"> --}}
                        <!-- Authentication Links -->
                                {{-- <li class="nav-item"> --}}
                                    {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                                {{-- </li>
                        </ul>
                            @endif

                            @if (Route::has('register'))
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"> --}}
                                    {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                                {{-- </li></ul> --}}

                                
                            @endif
                            
                        @else


                            <div id="sideNav" class="sideNav">
                                <a href="javascript:void(0)" class="closeBtn" onclick="closeNav()">&times;</a>
                                {{-- <a href="/admin/home">Home</a> --}}
                                @if (Auth::user()->role_id == 1)
                                    <a href="/admin/home">Home</a>
                                @else
                                @if (Auth::user()->role_id == 2)
                                    <a href="/konferens/home">Home</a>
                                @else
                                @if (Auth::user()->role_id == 3)
                                    <a href="/sec/home">Home</a>
                                @else
                                    <a href="/staff/home">Home</a>
                                    
                                @endif
                                @endif   
                                @endif

                                @if (Auth::user()->role_id == 4)
                                    <a href="/staff/attendance">Absensi</a>
                                @else
                                @if (Auth::user()->role_id == 1)
                                    <a href="/staff/attendance">Absensi</a>
                                @else
                                    <a href="/attendance">Absensi</a>
                                @endif   
                                @endif
                            
                            
                                {{-- <a href="/attendance">Absensi</a> --}}
                                @if (Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
                                <a href="/ukss">UKSS</a>
                                @endif

                                @if (Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
                                <a href="/member">Anggota</a>
                                @endif

                                @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 1)
                                    <a href="/church">Jemaat</a>
                                @endif
                                @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
                                <a href="/user">User</a>
                                @endif

                                @if (Auth::user()->role_id == 4 || Auth::user()->role_id == 1) 
                                    <a href="/ukssmem">Anggota UKSS</a>
                                @else
                                    <a href="/ukssmem/show">Anggota UKSS</a>
                                @endif

                                

                                {{-- <div class="nav-item dropdown" >
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle custom2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div> --}}
                            </div>





{{-- 

                        <ul class="navbar-nav nav-pills nav-justified me-auto">
                            <li class="nav-item nav-custom">
                                <a class="nav-link" href="/home">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item nav-custom">
                                <a class="nav-link" href="/church">{{ __('Jemaat') }}</a>
                            </li>
                            <li class="nav-item nav-custom">
                                <a class="nav-link" href="/ukss">{{ __('UKSS') }}</a>
                            </li>
                            <li class="nav-item nav-custom">
                                <a class="nav-link" href="/member">{{ __('Anggota') }}</a>
                            </li>
                            <li class="nav-item nav-custom">
                                <a class="nav-link" href="/attendance">{{ __('Kehadiran') }}</a>
                            </li>
                            <li class="nav-item nav-custom">
                                <a class="nav-link" href="/user">{{ __('User') }}</a>
                            </li>
                           
                        </ul> --}}
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle custom2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-endt no-border" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                    </ul>
                    
                    
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('javascript')
</body>
</html>
