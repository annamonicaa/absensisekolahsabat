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

                        <label>Triwulan</label>
                        <input name="triwulan">
                        <label>Tahun</label>
                        <input name="year"><br>

                        <button type="submit">Simpan</button>
                        <button type="reset">Reset</button>
                    </form>
                        

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
