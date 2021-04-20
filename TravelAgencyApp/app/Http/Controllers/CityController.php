<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();

        return view('cities.index', ['cities' => $cities]);
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store()
    {
        $validatedFields = request()->validate([
            'name' => ['required', 'unique:cities']
        ]);
        City::create($validatedFields);
        return $this->index();
    }
}
