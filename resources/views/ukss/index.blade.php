@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">UKSS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item active">UKSS</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg no-border">
                <div class="">
                    <div class="custom card-header">{{ __('Daftar UKSS') }}</div>
                </div>

                <div class="card-body">
                    
                    <div class="table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama UKSS</th>
                                    <th>Pemimpin</th>
                                    <th>Sekretaris</th>
                                    <th>Lokasi</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ukss as $u)
                                
                                <tr class="">
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->leader }}</td>
                                    <td>{{ $u->secretary }}</td>
                                    <td>{{ $u->loc }}</td>
                                    <td><a class="btn" href="{{ route('ukss.edit', $u->id) }}"><i class="fas fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ route('ukss.destroy', $u->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn btn-custom" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                        
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                        <a class="btn btn-custom" href="{{ route('ukss.create') }}">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
