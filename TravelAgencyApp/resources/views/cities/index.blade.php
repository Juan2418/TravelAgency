@extends('layout')

@section('content')
    @foreach($cities as $city)
        <section class="crud-item">
            <span class="city-name">{{$city->name}}</span>
            <a href="cities/{{$city->id}}/edit" class="btn">Edit</a>
            <a href="cities/{{$city->id}}/delete" class="btn">Delete</a>
        </section>
    @endforeach
@endsection

@section('head')
    <link rel="stylesheet" href="{{asset('css/cities-index.css')}}">
@endsection
