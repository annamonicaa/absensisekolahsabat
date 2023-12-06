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
                    <div class="table-responsive-md">
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
                                    <td>
                                        <button type="button" class="btn hover-uline" data-bs-toggle="modal" data-bs-target="#modal{{ $p->id }}">
                                            {{ $p->req }}
                                        </button>
                                    </td>
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
                    </div>
                        <p><a class="btn btn-custom" href="{{ route('prayer.create') }}">Tambah</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($prayer as $p)
<div class="modal fade" id="modal{{ $p->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <h1 class="modal-title fs-5" id="modalLabel">{{  }}</h1> --}}
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="h4 custom">Detail Doa</div>
          <div class="table-responsive-md">
          <table class="table">
            <tr>
                <th>Doa</th>
                <td>{{ $p->req }}</td>
            </tr>
            <tr>
                <th>Detail</th>
                <td class="text-wrap" style="min-width:6em; max-width: 15em; overflow-wrap: break-word">{{ $p->detail }}</td>
            </tr>
            <tr>
                <th>User yang menambahkan</th>
                <td>{{ $p->user->name }}</td>
            </tr>

          </table>
          </div>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
@endforeach

@endsection
