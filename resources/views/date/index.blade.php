@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card shadow no-border">
                {{-- <div class="card-header custom">{{ __('Daftar Jemaat') }}</div> --}}

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                        <table class="table">
                            {{-- <thead>
                                <tr>
                                    <th>Nama Jemaat</th>
                                    <th>Alamat</th>
                                    <th>Pendeta</th>
                                    <th>Ketua</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead> --}}
                            <tbody>
                                @foreach ($meeting as $m)
                                
                                <tr class="">
                                    <td><a href="{{ route('attendance.show', $m->id) }}">{{ $m->date }}</a></td>
                                    {{-- <td><a class="btn" href="{{ route('church.edit', $c->id) }}"><i class="fas fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ route('church.destroy', $c->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                        
                                    </td> --}}
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        {{-- <p><a class="btn" href="{{ route('mee.create') }}">Tambah</a></p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection