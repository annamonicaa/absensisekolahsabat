@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Daftar UKSS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item active">Anggota UKSS</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow no-border">
                <div class="">
                    <div class="custom card-header">{{ __('Daftar UKSS') }}</div>
                </div>
                {{-- <div class="card-body">
                    <table class="d-flex justify-content-center">
                        <tbody>
                            @foreach ($ukssmem as $um)
                            <tr>
                                <td><a class="p-5 btn btn-custom" href="{{ route('ukssmem.show', $um->ukss_id) }}">{{ $um->ukss->name }}</a></td>
                            </tr>    
                            @endforeach
                        </tbody>
                </table>
                
                </div> --}}
                {{-- <div class="card-body">
                    <div class="d-flex justify-content-center">
                        @foreach ($ukssmem as $um)
                            <div>
                                <div><a class="p-2 mx-auto px-5 btn btn-custom" href="{{ route('ukssmem.show', $um->ukss_id) }}">{{ $um->ukss->name }}</a></div>
                            </div> 
                            @endforeach
                    </div>
                </div> --}}

                <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-center">
                        @foreach ($ukss as $u)
                        @if ($u->id != 0)
                        <div>
                            <div class="m-2"><a class="pt-4 pb-4 mx-auto px-5 btn btn-custom" href="{{ route('ukssmem.show', $u->id) }}">{{ $u->name }}</a></div>
                        </div> 
                        @endif
                            
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection