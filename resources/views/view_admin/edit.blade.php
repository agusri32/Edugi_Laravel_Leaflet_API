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
		
			<form action="{{ route('admin.update', $result->id) }}" method="POST">
			@csrf
			@method('PUT')
				<div class="form-group"> 
					<label>Nama</label>
					<input type="text" class="form-control" name="nama" value="{{ $result->nama }}"/>
				</div>
				
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" value="{{ $result->email }}"/>
				</div>
				
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir" value="{{ $result->tempat_lahir }}"/>
				</div>
				
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tanggal_lahir" value="{{ $result->tanggal_lahir }}"/>
				</div>
				
				<div class="form-group">
					<label>Gender</label>
					<div class="form-group">
					@if ($result->gender == 'pria')
					<input type="radio" name="gender" value="Pria" checked> Pria<br>
					<input type="radio" name="gender" value="Wanita"> Wanita
					@else
					<input type="radio" name="gender" value="Pria"> Pria<br>
					<input type="radio" name="gender" value="Wanita" checked> Wanita
					@endif
					</div>
				</div>
				
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat">{{ $result->alamat }}</textarea>
				</div>
				
				<button type="submit" class="btn btn-primary">Simpan Data</button>
				<button type="button" onClick="location.href ='{{ route('admin.index')}}'" class="btn btn-danger">Kembali</button>
			</form>
			
		</div>
	</div>
</div>
@endsection