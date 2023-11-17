@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/user">User</a></li>
            <li class="breadcrumb-item active">Tambah User</li>
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

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Username</span>
                            <input name="username" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Password</span>
                            <input name="password" type="text" class="form-control" aria-label="Password" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nama</span>
                            <input name="name" type="text" class="form-control" aria-label="Nama" aria-describedby="basic-addon1">
                        </div>
                        {{-- <label>Nama</label>
                        <input name="name"><br> --}}

                        <input name="role_id" type="hidden" class="form-control" value="4" aria-label="Role" aria-describedby="basic-addon1">
                        <input name="ukss_id" type="hidden" class="form-control" value="0" aria-label="Ukss" aria-describedby="basic-addon1">



                        {{-- <input type="text" name="church_id" value="{{ Auth::user()->church_id }}" hidden><br> --}}
                        {{-- <input type="text"  value="{{ Auth::user()->church_id }}">

                        {{-- <input name="church_id"><br> --}}

                        <button class="btn btn-custom" onclick="return confirm('Apakah anda yakin untuk menyimpan data?')" type="submit">Simpan</button>
                        <button class="btn btn-custom" type="reset">Reset</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection