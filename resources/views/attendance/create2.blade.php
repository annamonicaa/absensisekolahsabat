@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Absensi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/staff/attendance/">Absensi</a></li>
            <li class="breadcrumb-item active">Tambah Absensi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card shadow no-border">
                <div class="card-header custom">{{ __('Absensi') }}</div>

                <div class="card-body">
                    <form action="{{ route('attendance.store') }}" method="POST">
                        @csrf

                        <label>Tanggal</label>
                        
                        <select class="form-control form-select" name="meeting_id" aria-describedby="basic-addon1">
                            <option value="" disable selected hidden>Choose</option>
                            @foreach ($meeting as $m)
                                <option value="{{ $m->id }}">
                                    {{ $m->date }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="ukss_id" value="{{ $ukss_id }}">
                        
                        {{-- <input type="hidden" name="meeting_id"> --}}
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
                                    <input class="form-control" type="hidden" name="attendance[{{ $loop->index }}][ukssmem_id]" value="{{ $um->id }}">
                                    <td>{{ $um->member->name }}</td>
                                    <td>
                                        <select class="form-select" name="attendance[{{ $loop->index }}][status]">
                                            <option value="hadir">Hadir</option>
                                            <option value="absen">Absen</option>
                                            <option value="terlambat">Terlambat</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" value="Ya" name="attendance[{{ $loop->index }}][ss]">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" value="Ya" name="attendance[{{ $loop->index }}][egw_book]">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-custom" onclick="return confirm('Apakah anda yakin untuk menyimpan data?')" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- 
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card shadow no-border">
                <div class="card-header custom">{{ __('Absensi') }}</div>

                <div class="card-body">
                    <form action="{{ route('attendance.store') }}" method="POST">
                        @csrf
                        <table>
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
                                    <td>{{ $um->member->name }}</td>
                                    <td>
                                        <select name="attendance[{{ $loop->index }}][status]">
                                            <option value="hadir">Hadir</option>
                                            <option value="absen">Absen</option>
                                            <option value="terlambat">Terlambat</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="checkbox" value="Ya" name="attendance[{{ $loop->index }}][ss]">
                                    </td>
                                    <td>
                                        <input type="checkbox" value="Ya" name="attendance[{{ $loop->index }}][egw_book]">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-custom" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    
--}}