@extends('layout')

@section('content')
    <form action="/flights/{{$flight->id}}" method="post">
        @csrf
        @method('PUT')

        <section class="form-element">
            <section class="form-item">
                <label for="origin_city_id" class="form-item-label">Origin city:</label>
                <select name="origin_city_id"
                        id="origin_city_id"
                        required>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}"
                            {{$city->id == $flight->origin_city_id ? 'selected' : ''}}
                        >
                            {{$city->name}}
                        </option>
                    @endforeach
                </select>
            </section>
            <section class="form-item">
                <label for="destination_city_id" class="form-item-label">Destination city:</label>
                <select name="destination_city_id"
                        id="destination_city_id"
                        required>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}"
                            {{$city->id == $flight->destination_city_id ? 'selected' : ''}}
                        >
                            {{$city->name}}
                        </option>
                    @endforeach
                </select>
            </section>
            <section class="form-item">
                <label for="departure_date" class="form-item-label">Departure: </label>
                <input type="datetime-local"
                       name="departure_date"
                       id="departure_date"
                       value="{{str_replace(' ', 'T', $flight->departure_date)}}"
                       required
                />
                @error('departure_date')
                <p class="help ">{{$errors->first('departure_date')}}</p>
                @enderror
            </section>
            <section class="form-item">
                <label for="arrival_date" class="form-item-label">Arrival: </label>
                <input type="datetime-local"
                       name="arrival_date"
                       id="arrival_date"
                       value="{{str_replace(' ', 'T', $flight->arrival_date)}}"
                       required
                />
                @error('arrival_date')
                <p class="help ">{{$errors->first('arrival_date')}}</p>
                @enderror
            </section>
        </section>
        <button type="submit" class="btn">Update flight</button>
    </form>
@endsection
