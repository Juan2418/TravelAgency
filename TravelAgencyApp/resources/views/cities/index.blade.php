@extends('layout')

@section('content')
    <ul>
        @foreach($cities as $city)
            <li>{{$city->name}}</li>
        @endforeach
    </ul>
@endsection
