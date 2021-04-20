@extends('layout')

@section('content')
    @foreach($cities as $city)
        <section class="crud-item">
            <span class="city-name">{{$city->name}}</span>
            <section class="crud-btn-options">
                <a href="cities/{{$city->id}}/edit" class="btn btn-crud">Edit</a>
                <a href="cities/{{$city->id}}/delete" class="btn btn-crud">Delete</a>
            </section>
        </section>
    @endforeach
@endsection

@section('head')
    <link rel="stylesheet" href="{{asset('css/cities-index.css')}}">
@endsection
