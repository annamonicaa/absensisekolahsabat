@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Absensi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/staff/attendance/">Absensi</a></li>
            <li class="breadcrumb-item active">Edit Absensi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card shadow no-border">
                <div class="card-header custom">{{ __('Edit Absensi') }}</div>

                <div class="card-body">
                    <form action="{{ route('attendance.update', [$ukss_id, $meetingId]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label>Tanggal</label>
                        <select class="form-control form-select" name="meeting_id" aria-describedby="basic-addon1">
                            <option value="" disabled selected hidden>Choose</option>
                            @foreach ($meeting as $m)
                                <option value="{{ $m->id }}" {{ $m->id == $attendance->meeting_id ? 'selected' : '' }}>
                                    {{ $m->date }}
                                </option>
                            @endforeach
                        </select>

                        <br>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Belajar SS</th>
                                    <th>Membaca Roh Nubuat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ukssmem as $um)
                                <tr>
                                    <input type="hidden" name="attendance[{{ $loop->index }}][ukssmem_id]" value="{{ $um->id }}">
                                    <td>{{ $um->member->name }}</td>
                                    <td>
                                        <select class="form-select" name="attendance[{{ $loop->index }}][status]">
                                            <option value="hadir" {{ $attendanceRecords->where('ukssmem_id', $um->id)->first()->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                            <option value="absen" {{ $attendanceRecords->where('ukssmem_id', $um->id)->first()->status == 'absen' ? 'selected' : '' }}>Absen</option>
                                            <option value="terlambat" {{ $attendanceRecords->where('ukssmem_id', $um->id)->first()->status == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" value="Ya" name="attendance[{{ $loop->index }}][ss]"
                                        {{ $attendanceRecords->where('ukssmem_id', $um->id)->first()->ss == 'Ya' ? 'checked' : '' }}>
                                    
                                        {{-- <input type="checkbox" class="form-check-input" value="Ya" name="attendance[{{ $loop->index }}][ss]"
                                        
                                            {{ $um->ss == 'Ya' ? 'checked' : '' }}> --}}
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" value="Ya" name="attendance[{{ $loop->index }}][egw_book]"
                                        {{ $attendanceRecords->where('ukssmem_id', $um->id)->first()->egw_book == 'Ya' ? 'checked' : '' }}>
                                        {{-- <input type="checkbox" class="form-check-input" value="Ya" name="attendance[{{ $loop->index }}][egw_book]"
                                            {{ $um->egw_book == 'Ya' ? 'checked' : '' }}> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-custom" onclick="return confirm('Apakah anda yakin untuk menyimpan data?')" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
