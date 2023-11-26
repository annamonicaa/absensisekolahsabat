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
            <li class="breadcrumb-item"><a href="/user">User</a></li>
            <li class="breadcrumb-item active">Edit User</li>
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
                    <div class="custom card-header">{{ __('Edit Data Anggota') }}</div>
                </div>

                <div class="card-body">
                    <div class="mt-4 mb-4 w-75 m-auto">
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            {{-- <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">UKSS</span>
                                <select class="form-control form-select" name="ukss_id" aria-describedby="basic-addon1">
                                    <option value="" disable selected hidden></option>
                                    @foreach ($ukss as $u)
                                    @if ($u->id != 0)
                                        <option value="{{ $u->id }}"{{ $user->ukss_id == $u->id ? 'selected' : '' }}>
                                            {{ $u->name }}
                                        </option>
                                    @endif
                                    @endforeach                            
                            </select>
                            </div> --}}
                            <input type="hidden" name="ukss_id" value="{{ $user->ukss_id }}">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Username</span>
                                <input name="username" value="{{ $user->username }}" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nama</span>
                                <input name="name" value="{{ $user->name }}" type="text" class="form-control" aria-label="Nama" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                                <input name="password" value="{{ $user->password }}" type="text" class="form-control" aria-label="Password" aria-describedby="basic-addon1">
                            </div>
                            {{-- <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Role</span>
                                <select class="form-control form-select" name="role_id" aria-describedby="basic-addon1">
                                    <option value="" disable selected hidden></option>
                                    @foreach ($role as $r)
                                    <option value="{{ $r->id }}"{{ $user->role_id == $r->id ? 'selected' : '' }}>
                                        {{ $r->role }}
                                    </option>
                                    @endforeach                            
                            </select>
                            </div> --}}
                            <input type="hidden" name="role_id" value="{{ $user->role_id }}">
                            <input type="hidden" name="church_id" value="{{ $user->church_id }}">
                            <button class="btn btn-custom" type="submit">Simpan</button>
                            <button class="btn btn-custom" type="reset">Reset</button>
                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection