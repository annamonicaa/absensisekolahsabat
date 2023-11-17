@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Anggota UKSS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          {{-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/staff/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/staff/attendance/">Absensi</a></li>
            <li class="breadcrumb-item active">Tambah Absensi</li>
          </ol> --}}
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow no-border">
                <div class="">
                    <div class="custom card-header">{{ __('Tambah Data Anggota UKSS') }}</div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ukssmem.store') }}">
                        @csrf

                        <div class="form-group">
                            <input type="hidden" name="ukss_id" value="{{ $ukss_id }}">
                            <input type="hidden" name="church_id" value="{{ Auth::user()->church_id }}">
                            <label>Pilih Angggota</label>
                            <input type="text" name="search" id="search" placeholder="Enter search name" class="form-control" onfocus="this.value=''">
                            <div id="search_list"></div>
                            <div id="search-results">
                            
                            @foreach ($member as $m)
                                
                                <div class="form-check">
                                    {{-- <input class="form-check-input" type="checkbox" name="member_ids[]" value="{{ $m->id }}" id="member_{{ $m->id }}">
                                    <label class="form-check-label" for="member_{{ $m->id }}">
                                        {{ $m->name }}
                                    </label> --}}

                                    <input class="form-check-input" type="checkbox" name="member_ids[]" value="{{ $m->id }}" id="member_{{ $m->id }}" {{ in_array($m->id, $selectedMember) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="member_{{ $m->id }}">
                                        {{ $m->name }}
                                    </label>
                                </div>


                            @endforeach
                            </div>
                        </div>
                        <button type="submit" onclick="return confirm('Apakah anda yakin untuk menyimpan data?')" class="btn btn-custom">Simpan</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
     $('#search').on('keyup',function(){
         var query= $(this).val();
         $.ajax({
            url:"search",
            type:"GET",
            data:{'search':query},
            success:function(data){
                $('#search_list').html(data);
            }
     });
     //end of ajax call
    });
    });
</script>
@endsection

