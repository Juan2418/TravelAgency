@extends('layout')

@section('content')
    <form action="/flights/create" method="get">
        @csrf
        <section class="form-item">
            <label for="airline_id" class="form-item-label">Select an airline:</label>
            <select name="airline_id"
                    id="airline_id"
                    required>
                @foreach($airlines as $airline)
                    <option value="{{$airline->id}}">{{$airline->name}}</option>
                @endforeach
            </select>
        </section>
        <button type="submit" class="btn">Select airline</button>
    </form>
@endsection
