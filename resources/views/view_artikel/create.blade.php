@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card uper">
		<div class="card-header">
		Form Tambah Data
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
			
			<form method="post" action="{{ route('artikel.store') }}">
			@csrf
				<div class="form-group"> 
					<label>Judul</label>
					<input type="text" class="form-control" name="judul"/>
					
				</div>

				<div class="form-group">
					<label>Keterangan</label>
					<textarea class="form-control" name="keterangan"></textarea>
				</div>
				
				<input type="hidden" value="0" class="form-control" name="kategori"/>
				<button type="submit" class="btn btn-primary">Tambah Data</button>
				<button type="button" onClick="location.href ='{{ route('artikel.index')}}'" class="btn btn-danger">Kembali</button>
			</form>

		</div>
	</div>
</div>
@endsection