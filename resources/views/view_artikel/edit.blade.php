@extends('layouts.app')
   
@section('content')
<div class="container">
	<div class="card uper">
		<div class="card-header">
		Form Edit Data
		</div>
		<div class="card-body">

			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div><br/>
			@endif
		
			<form action="{{ route('artikel.update', $result->id) }}" method="POST">
			@csrf
			@method('PUT')
				<div class="form-group"> 
					<label>Judul</label>
					<input type="text" class="form-control" name="judul" value="{{ $result->judul }}"/>
				</div>

				<div class="form-group">
					<label>Keterangan</label>
					<textarea class="form-control" name="keterangan">{{ $result->keterangan }}</textarea>
				</div>
				
				<input type="hidden" value="0" class="form-control" name="kategori"/>
				<button type="submit" class="btn btn-primary">Simpan Data</button>
				<button type="button" onClick="location.href ='{{ route('artikel.index')}}'" class="btn btn-danger">Kembali</button>
			</form>

		</div>
	</div>
</div>
@endsection