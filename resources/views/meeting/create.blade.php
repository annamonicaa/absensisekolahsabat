@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Pertemuan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item active">Tambah Pertemuan</li>
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
                    <div class="custom card-header">{{ __('Daftar Anggota') }}</div>
                </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    <div class="form-create mt-4 mb-4 w-75 m-auto">
                        <form action="{{ route('meeting.store') }}" method="POST">
                            @csrf
                            <div class="form-floating">

                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Tanggal</span>
                                <input name="date" type="date" class="form-control" aria-label="Permintaan Doa" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Triwulan</span>
                            <select class="form-control form-select" name="triwulan_id" aria-describedby="basic-addon1">
                                <option value="" disable selected hidden>Choose</option>
                                @foreach ($triwulan as $t)
                                    <option value="{{ $t->id }}">
                                        {{ $t->triwulan }} | {{ $t->year }}
                                    </option>
                                @endforeach
                            </select>
                            </div>
                            <button class="btn btn-custom w-100 py-2" onclick="return confirm('Apakah anda yakin untuk menyimpan data?')" type="submit">Simpan</button>
                            <button class="btn btn-custom w-100 py-2" type="reset">Reset</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
