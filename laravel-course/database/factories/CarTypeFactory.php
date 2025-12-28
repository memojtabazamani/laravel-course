<?php

namespace Database\Factories;

use App\Models\CarType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarType>
 */
class CarTypeFactory extends Factory
{
    protected $model = CarType::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Sedan', 'SUV', 'Truck', 'Coupe', 'Pride', 'Jeep', 'Crossover', 'Sports Car'])
        ];
    }
}
