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
                                    {{-- <th>Pemimpin</th>
                                    <th>Sekretaris</th>
                                    <th>Lokasi</th> --}}
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ukss  as $u)
                                <tr>
                                  <td>
                                    <button type="button" class="btn hover-uline" data-bs-toggle="modal" data-bs-target="#modal{{ $u->id }}">
                                        {{ $u->name }}
                                    </button>
                                </td>
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
{{-- @foreach ($ukss as $u)
                                
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
@endforeach --}}

@foreach ($ukss as $u)
    @php
        $ukssmem = \App\Models\Ukssmem::where('ukss_id', $u->id)->get();
    @endphp
<div class="modal fade" id="modal{{ $u->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
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
                <th>Nama UKSS</th>
                <td>{{ $u->name }}</td>
            </tr>
            <tr>
                <th>Pemimpin Diskusi</th>
                <td>{{ $u->leader }}</td>
            </tr>
            <tr>
                <th>Sekretaris</th>
                <td>{{ $u->secretary }}</td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td>{{ $u->loc }}</td>
            </tr>
            <tr>
                <th>
                    Anggota
                </th>
                <td> 
                    @foreach ($ukssmem as $um)
                    <ul style="margin: 0; padding-left:1.2em">
                        <li>
                            {{ $um->member->name }}
                        </li>
                    </ul>
                    @endforeach
                </td>
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
