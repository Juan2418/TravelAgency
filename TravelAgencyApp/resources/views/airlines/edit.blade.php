@extends('layout')

@section('content')
    <form action="/airlines/{{$airline->id}}" method="post">
        @csrf
        @method('PUT')

        <section class="form-element">
            <section class="form-item">
                <label for="name">Airline name:</label>
                <input type="text" name="name" id="name" value="{{$airline->name}}" class="input"/>
            </section>
            @error('name')
            <p class="help ">{{$errors->first('name')}}</p>
            @enderror
            <section class="form-item">
                <label for="description">Airline description:</label>
                <textarea rows="10" name="description" class="form-textarea input"
                          id="description">{{$airline->description}}</textarea>
            </section>
            <section class="form-item">
                <select id="cities[]" name="cities[]" multiple>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}"
                        {{in_array($city->name,$airline->cities->pluck('name')->toArray(), true) ? 'selected' : ''}}
                        >
                            {{$city->name}}
                        </option>
                    @endforeach
                </select>
            </section>
        </section>
        <button type="submit" class="btn">Update airline</button>
    </form>
@endsection
