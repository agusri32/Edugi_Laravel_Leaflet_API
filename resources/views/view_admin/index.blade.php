@extends('layouts.app')

@section('content')
<div class="container">

	@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br/>
	@endif
	
	<a href="{{ route('admin.create')}}" class="btn btn-primary">Tambah</a></td><br><br>
	<table class="table table-striped border">
    <thead>
        <tr>
          <td>No</td>
          <td>Nama Lengkap</td>
          <td>Tempat Lahir</td>
          <td>Tanggal Lahir</td>
          <td>Gender</td>
          <td>Alamat</td>
          <td>Kelola Data</td>
        </tr>
    </thead>
    <tbody>
        @foreach($result as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->nama}}</td>
            <td>{{$user->tempat_lahir}}</td>
            <td>{{$user->tanggal_lahir}}</td>
            <td>{{ucwords($user->gender)}}</td>
            <td>{{$user->alamat}}</td>
			<td align='left'>
                <form action="{{ route('admin.destroy', $user->id)}}" method="post">
					@csrf
					@method('DELETE')
					<a href="{{ route('admin.edit', $user->id)}}" class="btn btn-success">Edit</a>
					<a href="{{ route('admin.show', $user->id)}}" class="btn btn-primary">Cetak</a>
					<button class="btn btn-danger" type="submit" onClick="return confirm('Apakah Anda yakin akan menghapus data?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    
</div>
@endsection