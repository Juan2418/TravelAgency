<?php

namespace App\Http\Controllers;

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
}
