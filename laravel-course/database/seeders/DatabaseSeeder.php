<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarModel;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\State;
use App\Models\User;
use Database\Factories\CarTypeFactory;
use Database\Factories\CityFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $types = [
            'Sedan',
            'SUV',
            'Truck',
            'Coupe',
            'Pride',
            'Jeep',
            'Crossover',
            'Sports Car',
        ];

        //foreach ($types as $type) {
        CarType::factory()->sequence([
            ['name' => 'Sedan'],
            ['name' => 'SUV'],
            ['name' => 'Truck'],
            ['name' => 'Coupe'],
            ['name' => 'Pride'],
            ['name' => 'Jeep'],
            ['name' => 'Crossover'],
            ['name' => 'Sports Car'],
        ])
            ->count(9)
            ->create();
        // }

        // ==== Fuel Types ==== //
        $fuelTypes = ['Gas', 'Diesel', 'Electricity', 'Water Supply'];
        //foreach ($fuelTypes as $type) {
        FuelType::factory()->sequence([
            ['name' => 'Gas',],
            ['name' => 'Diesel',],
            ['name' => 'Electricity',],
            ['name' => 'Water Supply',],
        ])
            ->count(4)
            ->create();
        //}
        // ==== Cities and states ==== //
        $states = [
            'California' => [
                'Los Angeles',
                'San Francisco',
                'San Diego',
                'Sacramento',
                'San Jose',
                'Oakland',
            ],

            'Texas' => [
                'Houston',
                'Dallas',
                'Austin',
                'San Antonio',
                'El Paso',
                'Fort Worth',
            ],

            'New York' => [
                'New York City',
                'Buffalo',
                'Rochester',
                'Albany',
                'Syracuse',
            ],

            'Florida' => [
                'Miami',
                'Orlando',
                'Tampa',
                'Jacksonville',
                'Tallahassee',
            ],

            'Illinois' => [
                'Chicago',
                'Springfield',
                'Naperville',
                'Peoria',
            ],

            'Pennsylvania' => [
                'Philadelphia',
                'Pittsburgh',
                'Harrisburg',
                'Allentown',
            ],

            'Ohio' => [
                'Columbus',
                'Cleveland',
                'Cincinnati',
                'Toledo',
                'Dayton',
            ],

            'Georgia' => [
                'Atlanta',
                'Savannah',
                'Augusta',
                'Macon',
            ],

            'Arizona' => [
                'Phoenix',
                'Tucson',
                'Scottsdale',
                'Tempe',
            ],

            'Washington' => [
                'Seattle',
                'Spokane',
                'Tacoma',
                'Olympia',
            ],
        ];

        foreach ($states as $state => $cities) {
            State::factory()
                ->state([
                    'name' => $state,
                ])
                ->has(
                    City::Factory()
                        ->count(count($cities))
                        ->sequence(array_map(fn($city) => ['name' => $city], $cities))
                )
                ->create();
        }

        // ==== Model and makers ==== //
        $makers = [
            'Toyota' => [
                'Corolla',
                'Camry',
                'Prius',
                'RAV4',
                'Land Cruiser',
                'Hilux',
                'Yaris',
            ],

            'Honda' => [
                'Civic',
                'Accord',
                'CR-V',
                'Pilot',
                'Fit',
            ],

            'BMW' => [
                '3 Series',
                '5 Series',
                '7 Series',
                'X3',
                'X5',
                'X7',
            ],

            'Mercedes-Benz' => [
                'C-Class',
                'E-Class',
                'S-Class',
                'GLC',
                'GLE',
                'G-Class',
            ],

            'Audi' => [
                'A3',
                'A4',
                'A6',
                'A8',
                'Q3',
                'Q5',
                'Q7',
            ],

            'Ford' => [
                'Fiesta',
                'Focus',
                'Mustang',
                'Explorer',
                'F-150',
                'Ranger',
            ],

            'Chevrolet' => [
                'Malibu',
                'Impala',
                'Camaro',
                'Tahoe',
                'Silverado',
            ],

            'Nissan' => [
                'Altima',
                'Sentra',
                'Maxima',
                'X-Trail',
                'Patrol',
                'Navara',
            ],

            'Hyundai' => [
                'Elantra',
                'Sonata',
                'Tucson',
                'Santa Fe',
                'Accent',
            ],

            'Kia' => [
                'Rio',
                'Cerato',
                'Sportage',
                'Sorento',
                'Optima',
            ],
        ];

        foreach ($makers as $maker => $models) {
            Maker::factory()
                ->state([
                    'name' => $maker,
                ])->has(
                    CarModel::factory()
                        ->count(count($models))
                        ->sequence(array_map(fn($model) => ['name' => $model], $models))
                )
                ->create();
        }

        // ==== Create users ==== //
        User::factory()
            ->count(3)
            ->create();
        User::factory()
            ->count(2)
            ->has(
                Car::factory()
                ->count(50)
                ->has(
                    CarImage::factory()
                    ->count(5)
                    ->sequence(fn(Sequence $sequence) => ['position' => $sequence], $images)
                ),
                'favouriteCars'
            )
            ->create();
    }
}
