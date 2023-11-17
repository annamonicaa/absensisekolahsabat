@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Jemaat</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/konferens/home">Home</a></li>
            <li class="breadcrumb-item active">Jemaat</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card shadow no-border">
                <div class="card-header custom">{{ __('Daftar Jemaat') }}</div>

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
                                    <th>Nama Jemaat</th>
                                    <th>Alamat</th>
                                    <th>Pendeta</th>
                                    <th>Ketua</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($church as $c)
                                
                                <tr class="">
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->address }}</td>
                                    <td>{{ $c->pastor }}</td>
                                    <td>{{ $c->leader }}</td>
                                    <td><a class="btn" href="{{ route('church.edit', $c->id) }}"><i class="fas fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ route('church.destroy', $c->id) }}" method="POST">
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
                        <p><a class="btn btn-custom" href="{{ route('church.create') }}">Tambah</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection