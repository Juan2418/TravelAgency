@extends('layout')

@section('content')
    <form action="/airlines" method="post">
        @csrf

        <section class="form-element">
            <section class="form-item">
                <label for="name">Airline name:</label>
                <input type="text" name="name" id="name"/>
            </section>
            <section class="form-item">
                <label for="description">Airline description:</label>
                <input type="textarea" name="description" id="description"/>
            </section>
            <section class="form-item">
                <select id="cities[]" name="cities[]" multiple>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}"
                        >
                            {{$city->name}}
                        </option>
                    @endforeach
                </select>
            </section>
        </section>
        <button type="submit" class="btn">Add airline</button>
    </form>
@endsection
