<?php

namespace Database\Factories;

use App\Models\Airline;
use App\Models\Flight;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $airline = Airline::all()->random();

        $originCityId = $airline->cities->random()->id;
        $destinationCityId = $airline->cities->random()->id;


        return [
            'origin_city_id' => $originCityId,
            'destination_city_id' => $destinationCityId,
            'departure_date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+2days'),
            'arrival_date' => $this->faker->dateTimeBetween($startDate = '+2days', $endDate = '+3days'),
            'airline_id' => $airline->id
        ];
    }
}
