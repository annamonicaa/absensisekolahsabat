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
                                    <th>No. Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member as $m)
                                
                                <tr class="">
                                    <td>{{ $m->name }}</td>
                                    <td>{{ $m->phone }}</td>
                                    <td>{{ $m->gender }}</td>
                                    <td>{{ $m->address }}</td>
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
                        <p><a class="button" href="{{ route('member.create') }}">Tambah</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
