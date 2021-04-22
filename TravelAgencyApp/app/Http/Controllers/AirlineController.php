<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\City;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    public function index()
    {
        return view('airlines.index', ['airlines' => Airline::all()]);
    }

    public function edit(Airline $airline)
    {
        return view('airlines.edit', ['airline' => $airline, 'cities' => City::all()]);
    }

    public function create()
    {
        return view('airlines.create', ['cities' => City::all()]);
    }

    public function store()
    {
        $airline = new Airline($this->validateNameAndCities());
        $airline->save();
        $airline->cities()->attach(request('cities'));
        return redirect(route('airlines.index'));
    }

    public function update(Airline $airline)
    {
        $airline->update($this->validateNameAndCities());
        return redirect(route('airlines.index'));
    }

    private function validateNameAndCities(): array
    {
        return request()->validate([
            'name' => 'required|unique:airlines',
            'description' => 'required'
        ]);
    }
}
