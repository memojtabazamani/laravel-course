<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Maker;
use App\Models\CarModel;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\User;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        return [
            'maker_id' => Maker::inRandomOrder()->first()->id,
            // IMPORTANT: model must belong to the same maker
            'model_id' => function (array $attributes) {
              return CarModel::find($attributes['maker_id'])->id;
            },
            'year' => $this->faker->numberBetween(1995, now()->year),
            'price' => $this->faker->numberBetween(3_000, 120_000),
            'vin' => strtoupper($this->faker->bothify('##')), // 2 chars
            'car_type_id' => CarType::inRandomOrder()->first()->id,
            'fuel_type_id' => FuelType::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'city_id' => City::inRandomOrder()->first()->id,
            'address' => $this->faker->address,
            'phone' => function (array $attributes) {
              return User::find($attributes['user_id'])->phone;
            },
            'description' => $this->faker->optional()->paragraph(3),
            'published_at' => $this->faker->optional()->dateTimeBetween('-1 month', '+1 day'),
        ];
    }
}
