@extends('layout')

@section('content')
    <section class="submenu">
        <a href="{{route('flights.indexByDeparture')}}" class="menu-item">Sort By Departure Time</a>
    </section>
    <section class="flight-item-group">
        @foreach($flights as $flight)
            <a href="flights/{{$flight->id}}/edit" class="flight-item">
                <span>Airline: <em class="info">{{$flight->airline->name}}</em></span>
                <span>Origin city: <em class="info">{{$flight->originCity->name}}</em></span>
                <span>Destination city: <em class="info">{{$flight->destinationCity->name}}</em></span>
                <span>Departure at: <em class="info">{{$flight->departure_date}}</em></span>
                <span>Arrival at: <em class="info">{{$flight->arrival_date}}</em></span>
                <form method="post" action="/flights/{{$flight->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn danger">Cancel Flight</button>
                </form>
            </a>
        @endforeach
    </section>
@endsection

@section('head')
    <link rel="stylesheet" href="{{asset('css/flights-index.css')}}">
@endsection
