@extends('layout')

@section('content')
    @foreach($cities as $city)
        <a href="cities/{{$city->id}}/edit" class="crud-item">
            <span class="city-name">{{$city->name}}</span>
            <form method="post" action="/cities/{{$city->id}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn danger">Delete</button>
            </form>
        </a>
    @endforeach
@endsection

@section('head')
    <link rel="stylesheet" href="{{asset('css/cities-index.css')}}">
@endsection
