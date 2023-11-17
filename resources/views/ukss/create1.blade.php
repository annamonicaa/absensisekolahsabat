@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow no-border">
                <div class="">
                    <div class="custom card-header">{{ __('Daftar UKSS') }}</div>
                </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <h2>Tambah Daftar UKSS</h2>

                    <form action="{{ route('ukss.store') }}" method="POST">
                        @csrf

                        {{-- <label>Jemaat</label>
                        <select name="church_id">
                            <option value="" disable selected hidden>Choose</option>
                            @foreach ($church as $c)
                                <option value="{{ $c->id }}">
                                    {{ $c->name }}
                                </option>
                                
                            @endforeach
                        </select><br> --}}
                        {{-- <input type="hidden" name="church_id" value="{{ Auth::user()->church_id }}"> --}}
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Jemaat</span>
                            <select class="form-control form-select" aria-describedby="basic-addon1 name="church_id">
                                <option value="" disable selected hidden>Choose</option>
                                @foreach ($church as $c)
                                    <option value="{{ $c->id }}">
                                        {{ $c->name }}
                                    </option>
                                    
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nama UKSS</span>
                            <input name="name" type="text" class="form-control" aria-label="Nama UKSS" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Pemimpin Diskusi</span>
                            <input name="leader" type="text" class="form-control" aria-label="Pemimpin Diskusi" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Sekretaris</span>
                            <input name="secretary" type="text" class="form-control" aria-label="Sekretaris" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Lokasi</span>
                            <input name="loc" type="text" class="form-control" aria-label="Lokasi" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Triwulan</span>
                            <select class="form-control form-select" name="triwulan_id" aria-describedby="basic-addon1">
                                <option value="" disable selected hidden>Choose</option>
                                @foreach ($triwulan as $t)
                                    <option value="{{ $t->id }}">
                                        {{ $t->triwulan }} | {{ $t->year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <button class="btn btn-custom" onclick="return confirm('Apakah anda yakin untuk menyimpan data?')" type="submit">Simpan</button>
                        <button class="btn btn-custom" type="reset">Reset</button>
                    </form>
                        

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
