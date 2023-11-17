@extends('layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Jemaat</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/konferens/home">Home</a></li>
          <li class="breadcrumb-item"><a href="/church">Jemaat</a></li>
          <li class="breadcrumb-item active">Edit Jemaat</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Jemaat</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/konferens/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/church">Jemaat</a></li>
            <li class="breadcrumb-item active">Edit Jemaat</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow no-border">
                <div class="">
                    <div class="custom card-header">{{ __('Edit Data Jemaat') }}</div>
                </div>

                <div class="card-body">
                    <form action="{{ route('church.update', $church->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nama Jemaat</span>
                            <input name="name"  value="{{ $church->name }}" type="text" class="form-control" aria-label="Nama Jemaat" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Alamat</span>
                            <input name="address" value="{{ $church->address }}" type="text" class="form-control" aria-label="Alamat" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Gembala Jemaat</span>
                            <input name="pastor" value="{{ $church->pastor }}" type="text" class="form-control" aria-label="Gembala Jemaat" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Ketua Jemaat</span>
                            <input name="leader" value="{{ $church->leader }}" type="text" class="form-control" aria-label="Ketua Jemaat" aria-describedby="basic-addon1">
                        </div>

                        <button class="btn btn-custom" onclick="return confirm('Apakah anda yakin untuk menyimpan data?')" type="submit">Simpan</button>
                        <button class="btn" type="reset">Reset</button>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection