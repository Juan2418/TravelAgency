@extends('layout')

@section('content')
    <section class="form-element">
        <form action="/cities/{{$city->id}}" method="post">
            @csrf
            @method('PUT')
            <label for="name">City Name:</label>
            <input type="text" name="name"
                   placeholder="{{$city->name}}"
                   id="name"
                   class="input @error('name') is-danger @enderror"
                   required/>

            @error('name')
            <p class="help ">{{$errors->first('name')}}</p>
            @enderror

            <button type="submit" class="btn">Modificar Ciudad</button>
        </form>
    </section>
@endsection
