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
            <li class="breadcrumb-item"><a href="/staff/attendance/">Absensi</a></li>
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
                {{-- <div class="card-header custom">Absensi {{ $ukss->name }} Tanggal  </div> --}}
                <div class="card-body">
                    <div class="table-responsive-md">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>SS</th>
                                <th>RN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance  as $a)
                                <tr>
                                    <td>{{ $a->ukssmem->member->name }}</td>
                                    <td>{{ $a->status }}</td>
                                    <td>{{ $a->ss }}</td>
                                    <td>{{ $a->egw_book }}</td>
                                    {{-- <td>
                                        <a class="btn" href="{{ route('attendance.edit', $a->id) }}"><i class="fas fa-edit"></i></a>
                                    </td> --}}
                                </tr>

                            @endforeach
                            {{-- <a class="btn" href="{{ route('attendance.edit', $attendance->id) }}"><i class="fas fa-edit"></i></a> --}}
                            {{-- <td>{{ $member->name }}</td> --}}
                        </tbody>
                        
                    </table>
                    </div>
                    <a class="btn" href="{{ route('attendance.edit', [$ukss_id, $a->meeting_id]) }}"><i class="fas fa-edit"></i></a>
                    
                    <form method="POST" action="{{ route('attendance.destroy', [$ukss_id, $a->meeting_id]) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn" onclick="return confirm('Apakah anda yakin untuk menghapus data?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection