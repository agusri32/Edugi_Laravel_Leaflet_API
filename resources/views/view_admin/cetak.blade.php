@extends('layouts.app')
  
@section('content')
<body onLoad="window.print()">
	<div class="card uper">
		<div class="card-header" id="not-print">
		Cetak Data
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
					<input type="text" class="form-control" name="nama" value="{{ $result->nama }}" disabled/>
				</div>
				
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" value="{{ $result->email }}" disabled/>
				</div>
				
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir" value="{{ $result->tempat_lahir }}" disabled/>
				</div>
				
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tanggal_lahir" value="{{ $result->tanggal_lahir }}" disabled/>
				</div>
				
				<div class="form-group">
					<label>Gender</label>
					<div class="form-group">
					@if ($result->gender == 'pria')
					  <input type="radio" name="gender" value="Pria" disabled> Pria<br>
					  <input type="radio" name="gender" value="Wanita" disabled> Wanita
					@else
					  <input type="radio" name="gender" value="Pria" disabled> Pria<br>
					  <input type="radio" name="gender" value="Wanita" disabled> Wanita
					@endif
					</div>
				</div>
				
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat" disabled>{{ $result->alamat }}</textarea>
				</div>
				
				<button type="button" id="not-print" onClick="window.print();return false" class="btn btn-primary">Cetak Data</button>
				<button type="button" id="not-print" onClick="location.href ='{{ route('admin.index')}}'" class="btn btn-danger">Kembali</button>
			</form>
		</div>
	</div>
</body>
@endsection