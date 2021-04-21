<?php

namespace Database\Factories;

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
        return [
            'origin_city_id' => City::all()->random()->id,
            'destination_city_id' => City::all()->random()->id,
            'departure_date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+2days'),
            'arrival_date' => $this->faker->dateTimeBetween($startDate = '+2days', $endDate = '+3days'),
        ];
    }
}
