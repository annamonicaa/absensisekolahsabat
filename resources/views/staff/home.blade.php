@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="ttl">Selamat Datang Staff SS</h1>
            <div class="card shadow no-border">
                <div class="">
                    <div class="custom card-header">{{ __('Permintaan Doa') }}</div>
                </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th>Tanggal</th> --}}
                                    <th>Yang ingin didoakan</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($prayer as $p)
                                
                                <tr class="">
                                    {{-- <td>{{ $p->date }}</td> --}}
                                    <td>{{ $p->req }}</td>
                                    
                                    {{-- <td>
                                        <select name="church_id">
                                            <option value="" disable selected hidden></option>
                                            @foreach ($church as $c)
                                                <option value="{{ $c->id }}">
                                                    {{ $c->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td> --}}
                                
                                    <td><a class="btn" href="{{ route('prayer.edit', $p->id) }}"><i class="fas fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ route('prayer.destroy', $p->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                        
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Tidak Ada Data</td>
                                    </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                        <p><a class="btn btn-custom" href="{{ route('prayer.create') }}">Tambah</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
