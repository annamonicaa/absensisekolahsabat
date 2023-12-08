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
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($church as $c)
                                
                                <tr class="">
                                    <td>
                                        <button type="button" class="btn hover-uline" data-bs-toggle="modal" data-bs-target="#modal{{ $c->id }}">
                                            {{ $c->name }}
                                        </button>
                                    </td>
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
@foreach ($church as $c)
<div class="modal fade" id="modal{{ $c->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <h1 class="modal-title fs-5" id="modalLabel">{{  }}</h1> --}}
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="h4 custom">Detail Jemaat</div>
          <table class="table">
            <tr>
                <th>Nama Jemaat</th>
                <td>{{ $c->name }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $c->address }}</td>
            </tr>
            <tr>
                <th>Pendeta</th>
                <td>{{ $c->pastor }}</td>
            </tr>
            <tr>
                <th>Ketua</th>
                <td>{{ $c->leader }}</td>
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