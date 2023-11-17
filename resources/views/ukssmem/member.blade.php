@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Anggota UKSS</h1>
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
                {{-- <div class="card-header custom">{{ $ukssmem->ukss->name }}</div> --}}
                <div class="card-body">
                    <div class="table-responsive-md">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Daftar Anggota </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($member  as $um)
                                <tr>
                                    <td>{{ $um->member->name }}</td>
                                    <td>
                                        <form action="{{ route('ukssmem.destroy', $um->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            
                            {{-- <td>{{ $member->name }}</td> --}}
                        </tbody>
                    </table>
                    </div>
                    <p><a class="button" href="{{ route('ukssmem.create', ['ukss_id' => $ukss->id]) }}">Tambah</a></p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection