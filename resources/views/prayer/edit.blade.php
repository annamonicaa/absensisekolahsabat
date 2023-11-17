@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Doa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          {{-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/staff/attendance/">Absensi</a></li>
            <li class="breadcrumb-item active">Tambah Absensi</li>
          </ol> --}}
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow no-border">
                <div class="">
                    <div class="custom card-header">{{ __('Edit Permintaan Doa') }}</div>
                </div>

                <div class="card-body">
                    <form action="{{ route('prayer.update', $prayer->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Tanggal</span>
                            <input name="date" value="{{ $prayer->date }}" type="date" class="form-control" aria-label="Permintaan Doa" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Permintaan Doa</span>
                            <input name="req" value="{{ $prayer->req }}" type="text" class="form-control" aria-label="Permintaan Doa" aria-describedby="basic-addon1">
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