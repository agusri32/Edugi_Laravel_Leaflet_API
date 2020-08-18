@extends('layouts.app')

@section('content')
<div class="container">

    @if(session()->get('success'))
    <div class="alert alert-success">
    {{ session()->get('success') }}  
    </div><br/>
    @endif
    
    <a href="{{ route('artikel.create')}}" class="btn btn-primary">Tambah</a></td><br><br>
    <table class="table table-striped border">
    <thead>
        <tr>
        <td>No</td>
        <td>Judul</td>
        <td>Keterangan</td>
        <td>Kelola Data</td>
        </tr>
    </thead>
    <tbody>
        @foreach($result as $artikel)
        <tr>
            <td>{{$artikel->id}}</td>
            <td>{{$artikel->judul}}</td>
            <td>{{ucwords($artikel->keterangan)}}</td>
            <td align='left' width="15%">
                <form action="{{ route('artikel.destroy', $artikel->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('artikel.edit', $artikel->id)}}" class="btn btn-success">Edit</a>
                    <button class="btn btn-danger" type="submit" onClick="return confirm('Apakah Anda yakin akan menghapus data?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

</div>
@endsection