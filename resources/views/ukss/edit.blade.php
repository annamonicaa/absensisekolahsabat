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
                    <div class="custom card-header">{{ __('Permintaan Doa') }}</div>
                </div>

                <div class="card-body">

                    <h2>Buat Permintaan Doa</h2>
                    <form action="{{ route('ukss.update', $ukss->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label>Jemaat</label>
                        <select name="church_id">
                            <option value="">Choose</option>
                            @foreach ($church as $c)
                                <option value="{{ $c->id }}"{{ $ukss->church_id == $c->id ? 'selected' : '' }}>
                                    {{ $c->name }}
                                </option>
                                
                            @endforeach
                        </select><br>

                        <label>Nama UKSS </label>
                        <input name="name" value="{{ $ukss->name }}"><br>
                        <label>Pemimpin Diskusi</label>
                        <input name="leader" value="{{ $ukss->leader }}"><br>
                        <label>Sekretaris</label>
                        <input name="secretary" value="{{ $ukss->secretary }}"><br>
                        <label>Lokasi</label>
                        <input name="loc" value="{{ $ukss->loc }}"><br>
                        <button onclick="return confirm('Apakah anda yakin untuk menyimpan data?')" type="submit">Simpan</button>
                        <button type="reset">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection