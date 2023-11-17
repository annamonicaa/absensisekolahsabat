@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="card-body">
                    <div class="p-3">
                    <h3>Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-floating mb-3 mt-3 pt-2 pb-2">
                            <input type="username" class="form-control" @error('username') is-invalid @enderror id="username" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            <label for="username">Username</label>
                        </div>


                        {{-- @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $error }}</strong>
                            </span>
                            @enderror --}}
                        <div class="form-floating mb-3 mt-3 pt-2 pb-2">
                            <input type="password" class="form-control" @error('password') is-invalid @enderror id="password" placeholder="Password" name="password" value="{{ old('username') }}" required autocomplete="current-password">
                            <label for="password">Password</label>
                        </div>
                                @if (session('error'))
                                <div class="mt-3 alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    {{ session('error') }}
                                </div>
                                @endif
                            
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-login">
                                    {{ __('Login') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div><p>//password : string</p>
        </div>
    </div>
</div>
@endsection
