@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Absensi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/staff/attendance/">Absensi</a></li>
            <li class="breadcrumb-item active">Tambah Absensi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow no-border">
                <div class="">
                    <div class="custom card-header">{{ __('Tambah User') }}</div>
                </div>

                <div class="card-body">

                    <h2>Tambah User</h2>
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Username</span>
                            <input name="username" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Password</span>
                            <input name="password" type="text" class="form-control" aria-label="Password" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Role</span>
                            <select class="form-control form-select" name="role_id" aria-describedby="basic-addon1">
                                <option value="" disable selected hidden></option>
                                @foreach ($role as $r)
                                <option value="{{ $r->id }}">
                                    {{ $r->role }}
                                </option>
                                @endforeach                            
                        </select>
                        </div>


                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">UKSS</span>
                            <select class="form-control form-select" name="ukss_id" aria-describedby="basic-addon1">
                                <option value="" disable selected hidden></option>
                                @foreach ($ukss as $u)
                                    <option value="{{ $u->id }}">
                                        {{ $u->name }}
                                    </option>
                                @endforeach                            
                        </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Jemaat</span>
                            <select class="form-control form-select" name="church_id" aria-describedby="basic-addon1">
                            <option value="" disable selected hidden></option>
                            @foreach ($church as $c)
                                <option value="{{ $c->id }}">
                                     {{ $c->name }}
                                </option>
                            @endforeach
                            
                        </select>
                        </div>
                        
                       
                        <button class="btn" type="submit">Simpan</button>
                        <button class="btn" type="reset">Reset</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection