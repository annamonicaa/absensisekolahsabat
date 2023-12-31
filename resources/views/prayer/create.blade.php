@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Doa</h1>
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
                    <div class="custom card-header">{{ __('Tambah Doa') }}</div>
                </div>

                <div class="card-body">

                    <div class="form-create mt-4 mb-4 w-75 m-auto">
                        <form action="{{ route('prayer.store') }}" method="POST">
                            @csrf
                            <div class="form-floating">

                            </div>
                            {{-- <label>Tanggal</label>
                            <input type="date" name="date"><br> --}}
                            
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Permintaan Doa</span>
                                <input name="req" type="text" class="form-control" aria-label="Permintaan Doa" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Detail Doa</span>
                                <textarea name="detail" class="form-control" rows="4" cols="50" aria-label="Detail Doa" aria-describedby="basic-addon1"></textarea>

                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="text" name="church_id" value="{{ Auth::user()->church_id }}" hidden><br>
                            <button class="btn btn-custom" onclick="return confirm('Apakah anda yakin untuk menyimpan data?')" type="submit" >Simpan</button>
                            
                            <button class="btn btn-custom" type="reset">Reset</button>
    
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@push('javascript')
<script>
    console.log('blabla');
    function showConfirmation() {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda akan menyimpan data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan Data!'
    }).then((result) => {
        if (result.isConfirmed) {
            var form = document.querySelector('form');
            form.submit();
        }
    });
}

</script>
@endpush

@endsection