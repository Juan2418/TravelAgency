@extends('layout')

@section('content')
    @foreach($airlines as $airline)
        <a href="airlines/{{$airline->id}}/edit" class="crud-item">
            <span class="info">{{$airline->name}}</span>
            <form method="post" action="/airlines/{{$airline->id}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn danger">Delete</button>
            </form>
        </a>
    @endforeach
@endsection
