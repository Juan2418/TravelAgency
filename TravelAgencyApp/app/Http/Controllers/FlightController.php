<?php

namespace App\Http\Controllers;

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

    public function create()
    {
        return view('flights.create', ['cities' => City::all()]);
    }

    public function store()
    {
        $validatedFields = $this->validateCitiesAndDates();
        Flight::create($validatedFields);
        return redirect(route('flights.index'));
    }

    private function validateCitiesAndDates(): array
    {
        return request()->validate([
            'origin_city_id' => 'required',
            'destination_city_id' => 'required',
            'departure_date' => 'required',
            'arrival_date' => 'required'
        ]);
    }
}
