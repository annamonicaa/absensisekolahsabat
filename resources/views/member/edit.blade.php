@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Anggota</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/staff/member/">Anggota</a></li>
            <li class="breadcrumb-item active">Edit Anggota</li>
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
                    <div class="custom card-header">{{ __('Edit Anggota') }}</div>
                </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    <div class="mt-4 mb-4 w-75 m-auto">
                        <form action="{{ route('member.update', $member->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Nama</span>
                              <input name="name" value="{{ $member->name }}" type="text" class="form-control" aria-label="Nama" aria-describedby="basic-addon1">
                          </div>
                          <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Telepon</span>
                              <input name="phone" value="{{ $member->phone }}" type="text" class="form-control" aria-label="Telepon" aria-describedby="basic-addon1">
                          </div>
                          <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Alamat</span>
                              <input name="address" value="{{ $member->address }}" type="text" class="form-control" aria-label="Alamat" aria-describedby="basic-addon1">
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Jenis Kelamin</span>
                            <input name="gender" value="{{ $member->gender }}" type="text" class="form-control" aria-label="Jenis Kelamin" aria-describedby="basic-addon1">
                        </div>
                            <input type="text" name="church_id" value="{{ Auth::user()->church_id }}" hidden><br>
                        </div>
                        <button class="btn btn-custom" onclick="return confirm('Apakah anda yakin untuk menyimpan data?')" type="submit">Simpan</button>
                        <button class="btn btn-custom" type="reset">Reset</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
