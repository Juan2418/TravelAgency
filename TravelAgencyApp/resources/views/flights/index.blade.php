@extends('layout')

@section('content')
    <section class="submenu">
        <a href="{{route('flights.indexByDeparture')}}" class="menu-item">Sort By Departure Time</a>
    </section>
    <section class="flight-item-group">
        @foreach($flights as $flight)
            <section class="flight-item">
                <span>Origin city: <em class="info">{{$flight->originCity->name}}</em></span>
                <span>Destination city: <em class="info">{{$flight->destinationCity->name}}</em></span>
                <span>Departure at: <em class="info">{{$flight->departure_date}}</em></span>
                <span>Arrival at: <em class="info">{{$flight->arrival_date}}</em></span>
            </section>
        @endforeach
    </section>
@endsection

@section('head')
    <link rel="stylesheet" href="{{asset('css/flights-index.css')}}">
@endsection
