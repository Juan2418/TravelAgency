<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Flight;

class FlightController extends Controller
{
    public function index()
    {
        $nextFlights = Flight::where('departure_date', '>=', date('Y-m-d H:i:s'))->get();

        return view('flights.index', ['flights' => $nextFlights]);
    }

    public function indexByDeparture()
    {
        $nextFlights = Flight::where('departure_date', '>=', date('Y-m-d H:i:s'))
            ->orderBy('departure_date')
            ->get();

        return view('flights.index', ['flights' => $nextFlights]);
    }

    public function selectAirline()
    {
        return view('flights.airline', ['airlines' => Airline::all()]);
    }

    public function create() {
        $airline = Airline::where('id', '=', request('airline_id'))->first();

        return view('flights.create', ['airline' => $airline]);
    }

    public function store()
    {
        $validatedFields = $this->validateCitiesAirlineAndDates();
        Flight::create($validatedFields);
        return redirect(route('flights.index'));
    }

    public function edit(Flight $flight)
    {
        return view('flights.edit', ['flight' => $flight, 'cities' => City::all()]);
    }

    public function update(Flight $flight)
    {
        $flight->update($this->validateCitiesAirlineAndDates());
        return redirect(route('flights.index'));
    }

    public function delete(Flight $flight)
    {
        $flight->delete();
        return redirect(route('flights.index'));
    }

    private function validateCitiesAirlineAndDates(): array
    {
        return request()->validate([
            'origin_city_id' => 'required',
            'destination_city_id' => 'required',
            'departure_date' => 'required',
            'arrival_date' => 'required',
            'airline_id' => 'required'
        ]);
    }
}
