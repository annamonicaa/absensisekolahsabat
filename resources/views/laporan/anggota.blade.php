@extends('layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Laporan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
          <li class="breadcrumb-item active">Laporan</li>
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
                <div class="custom card-header">Laporan Kehadiran <b> {{ $attendance->first()->ukssmem->member->name }} </b></div>
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
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Belajar SS</th>
                                <th>Roh Nubuat</th>
                                {{-- <th colspan="2">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $a)
                            
                            <tr class="">
                                <td>{{ $a->meeting->date }}</td>
                                <td>{{ $a->status }}</td>
                                <td>{{ $a->ss }}</td>
                                <td>{{ $a->egw_book }}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
