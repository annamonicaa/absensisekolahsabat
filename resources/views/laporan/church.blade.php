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
    <div class="col-sm-3">
        <a href="{{ route('jemaatukss', $p['church_id']) }}">
        <div class="card-body p-4">
            <h5>Laporan Kehadiran dari {{ $p['church_name'] }}</h5>
            <hr>
            <div class="percentage-bar">
                <div class="progress-bar" style="width: {{ $p['attendancePercentage'] }}%;">
                    {{ number_format($p['attendancePercentage'], 2) }}%
                </div>
            </div>
        </div>
        </a>
    </div>
    @endforeach



  </div>
</div>
@endsection

