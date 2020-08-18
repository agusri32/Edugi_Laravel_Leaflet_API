@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-7">

        <form action="#" method="POST">
			@csrf
			@method('PUT')
            <div class="form-group"> 
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value="{{ $result['data']['judul'] }}" disabled/>
            </div>
            
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" class="form-control" name="kategori" value="{{ $result['data']['kategori'] }}" disabled/>
            </div>
            
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan" disabled>{{ $result['data']['keterangan'] }}</textarea>
            </div>
            <button type="button" onClick="location.href ='{{ route('maping.index')}}'" class="btn btn-danger">Kembali</button>
		</form>

    </div>
</div>
@endsection