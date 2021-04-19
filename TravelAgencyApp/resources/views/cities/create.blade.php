@extends('layout')

@section('content')
    <form action="/cities" method="post">
        @csrf
        <section class="form-element">
            <label for="name">City Name:</label>
            <input type="text" name="name" id="name" required/>
        </section>

        <button type="submit" class="btn">Crear Ciudad</button>
    </form>
@endsection
