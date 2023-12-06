@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Anggota</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item active">Anggota</li>
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
                    <div class="table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member as $m)
                                
                                <tr class="">
                                    <td>
                                        <button type="button" class="btn hover-uline" data-bs-toggle="modal" data-bs-target="#modal{{ $m->id }}">
                                            {{ $m->name }}
                                        </button>
                                    </td>
                                    <td><a class="btn" href="{{ route('member.edit', $m->id) }}"><i class="fas fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ route('member.destroy', $m->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                        
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                        <p><a class="btn btn-custom" href="{{ route('member.create') }}">Tambah</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($member as $m)
<div class="modal fade" id="modal{{ $m->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <h1 class="modal-title fs-5" id="modalLabel">{{  }}</h1> --}}
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="h4 custom">Detail UKSS</div>
          <table class="table">
            <tr>
                <th>Nama</th>
                <td>{{ $m->name }}</td>
            </tr>
            <tr>
                <th>No. Telp</th>
                <td>{{ $m->phone }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $m->gender }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $m->address }}</td>
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
