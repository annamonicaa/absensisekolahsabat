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
    @foreach ($percentage as $p)  
    @if ($p['ukss_id'] != 0)
    <div class="col-sm-3">
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $p['ukss_id'] }}">
        <div class="btnbtn rounded border-light-subtle">
          <div class="card-body p-4">
            <h5>Laporan Kehadiran dari {{ $p['ukss_name'] }}</h5>
            <hr>
            <div class="percentage-bar">
              <div class="progress-bar" style="width: {{ $p['attendancePercentage'] }}%;">
                {{ number_format($p['attendancePercentage'], 2) }}%
              </div>
            </div>
          </div>
        </div>
      </button>
      
      {{-- <button class="percent btn" onclick="window.location='{{ route('list', $p['ukss_id']) }}'">
        <div class="card shadow no-border">
          <div class="card-body">
            <h5>Laporan Kehadiran dari {{ $p['ukss_name'] }}</h5>
            <hr>
            <div class="percentage-bar">
              <div class="progress-bar" style="width: {{ $p['attendancePercentage'] }}%;">
                {{ number_format($p['attendancePercentage'], 2) }}%
              </div>
            </div>
          </div>
        </div>
        
      </button> --}}


    </div>
    @endif
    @endforeach
  </div>
</div>
@endsection


@foreach ($percentage as $p)
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{ $p['ukss_id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Laporan Absensi {{ $p['ukss_name'] }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- <div class="custom">Laporan Absensi {{ $p['ukss_name'] }}</div> --}}
          <table class="table">
            <thead>
              <tr>
                <th>Nama</th>
                <th colspan="3">Kehadiran</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($p['attendanceDetails'] as $r)
                @if ($r->ukss_id == $p['ukss_id'])
                  <tr>
                    <td>
                      <a href="{{ route('laporanAnggota', $p['ukssmem_ids']) }}">
                        {{ $r->name }}
                      </a>
                    </td>
                    <td>H: {{ $r->yanghadir }}</td>
                    <td>A: {{ $r->yangabsen }}</td>
                    <td>T: {{ $r->yangterlambat }}</td>
                  </tr>
                @endif
              @endforeach
            </tbody>
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
