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
        return redirect(route('cities.index'));
    }

    public function edit(City $city)
    {
        return view('cities.edit', ['city' => $city]);
    }

    public function update(City $city)
    {
        if (strcmp($city->name, request('name')) != 0) {
            $city->update($this->validateCityName());
        }
        return redirect(route('cities.index'));
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

    public function delete(City $city)
    {
        $city->delete();
        return redirect(route('cities.index'));
    }
}
