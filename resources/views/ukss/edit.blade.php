@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit UKSS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/ukss">UKSS</a></li>
            <li class="breadcrumb-item active">Edit Absensi</li>
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
                    <div class="custom card-header">{{ __('Edit UKSS') }}</div>
                </div>

                <div class="card-body">

                    <h2>Edit UKSS</h2>
                    <form action="{{ route('ukss.update', $ukss->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="church_id" value="{{ $ukss->church_id }}">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">Nama UKSS</span>
                          <input name="name" type="text" value="{{ $ukss->name }}" class="form-control" aria-label="Nama UKSS" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">Pemimpin Diskusi</span>
                          <input name="leader" value="{{ $ukss->leader }}" type="text" class="form-control" aria-label="Pemimpin Diskusi" aria-describedby="basic-addon1">
                      </div>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Sekretaris</span>
                        <input name="secretary" value="{{ $ukss->secretary }}" type="text" class="form-control" aria-label="Sekretaris" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Lokasi</span>
                      <input name="loc" type="text" value="{{ $ukss->loc }}" class="form-control" aria-label="Lokasi" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Triwulan</span>
                      <select class="form-control form-select" name="triwulan_id" aria-describedby="basic-addon1">
                          <option value="" disable selected hidden>Choose</option>
                          @foreach ($triwulan as $t)
                              <option value="{{ $t->id }}"{{ $ukss->triwulan_id == $t->id ? 'selected' : '' }}>
                                  {{ $t->triwulan }} | {{ $t->year }}
                              </option>
                          @endforeach
                      </select>
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