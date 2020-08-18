@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-7">

        <table class="table table-striped border">
        <thead>
            <tr>
            <td>No</td>
            <td>Judul</td>
            <td>Detail</td>
            </tr>
        </thead>
        <tbody>
            @foreach($result['data'] as $artikel)
            <tr>
                <td>{{$artikel['id']}}</td>
                <td>{{$artikel['judul']}}</td>
                <td>
                @csrf
                <a href="{{ route('maping.show', $artikel['id'])}}" class="btn btn-success">Read More</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>

    </div>
</div>
@endsection