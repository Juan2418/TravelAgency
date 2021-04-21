@extends('layout')

@section('head')
{{--    <link rel="stylesheet" href="{{asset('../../css/create-city.css')}}">--}}
@endsection

@section('content')
    <form action="/cities" method="post">
        @csrf
        <section class="form-element">
            <label for="name">City Name:</label>
            <input type="text" name="name" id="name" class="input @error('name') is-danger @enderror" required/>

            @error('name')
                <p class="help ">{{$errors->first('name')}}</p>
            @enderror
        </section>

        <button type="submit" class="btn">Add City</button>
    </form>
@endsection

