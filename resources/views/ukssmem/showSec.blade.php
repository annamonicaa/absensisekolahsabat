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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ukssmem  as $um)
                                <tr>
                                  <td>
                                    <button type="button" class="btn hover-uline" data-bs-toggle="modal" data-bs-target="#modal{{ $um->id }}">
                                        {{ $um->member->name }}
                                    </button>
                                </td>
                                </tr>
                            @endforeach
                            
                            {{-- <td>{{ $member->name }}</td> --}}
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($ukssmem as $um)
<div class="modal fade" id="modal{{ $um->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <h1 class="modal-title fs-5" id="modalLabel">{{  }}</h1> --}}
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="h4 custom">Detail Anggota</div>
          <table class="table">
            <tr>
                <th>Nama</th>
                <td>{{ $um->member->name }}</td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td>{{ $um->member->phone }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $um->member->address }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $um->member->gender }}</td>
            </tr>
         
          </table>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
@endforeach
@endsection