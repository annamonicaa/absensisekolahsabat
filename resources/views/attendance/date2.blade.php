 @extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Absensi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item active">Absensi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow no-border">
                <div class="card-body">
                    <p><a class="btn btn-custom" href="{{ route('attendance.create2', $ukss_id) }}">Tambah</a></p>
                    @foreach ($attendance as $a)
                        <a class="btn"  href="{{ route('attendance.show', [$ukss_id, $a->meeting_id]) }}">{{ $a->meeting->date }} </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
