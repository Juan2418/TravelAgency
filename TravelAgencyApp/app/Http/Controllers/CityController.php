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
        $validatedFields = $this->validateCityName();
        City::create($validatedFields);
        redirect('/');
    }

    public function edit(City $city)
    {
        return view('cities.edit', ['city' => $city]);
    }

    public function update(City $city)
    {
        $city->update($this->validateCityName());
        redirect('/');
    }

    /**
     * @return array
     */
    private function validateCityName(): array
    {
        return request()->validate([
            'name' => ['required', 'unique:cities']
        ]);
    }
}
