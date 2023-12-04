@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow no-border">
                <div class="">
                    <div class="custom card-header">{{ __('Triwulan') }}</div>
                </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <h2>Tambah Triwulan</h2>

                    <form action="{{ route('triwulan.store') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Triwulan</span>
                            <input name="triwulan" type="text" class="form-control" aria-label="Triwulan" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Tahun</span>
                            <input name="year" type="text" class="form-control" aria-label="Tahun" aria-describedby="basic-addon1">
                        </div>
                       <button class="btn btn-custom" type="submit">Simpan</button>
                        <button class="btn btn-custom" type="reset">Reset</button>
                    </form>
                        

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
