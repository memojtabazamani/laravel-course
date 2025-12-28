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
        CarType::factory()
            ->count(8)
            ->sequence(
                ['name' => 'Sedan'],
                ['name' => 'SUV'],
                ['name' => 'Truck'],
                ['name' => 'Coupe'],
                ['name' => 'Pride'],
                ['name' => 'Jeep'],
                ['name' => 'Crossover'],
                ['name' => 'Sports Car'],
            )
            ->create();


        // ==== Fuel Types ==== //
        $fuelTypes = ['Gas', 'Diesel', 'Electricity', 'Water Supply'];
        //foreach ($fuelTypes as $type) {
        FuelType::factory()
            ->count(4)
            ->sequence(
                ['name' => 'Gas'],
                ['name' => 'Diesel'],
                ['name' => 'Electricity'],
                ['name' => 'Water Supply'],
            )
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
                ->state(['name' => $state])
                ->has(
                    City::factory()
                        ->count(count($cities))
                        ->state(new Sequence(
                            ...array_map(fn ($city) => ['name' => $city], $cities)
                        ))
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

        foreach ($makers as $makerName => $models) {
//            // Create the maker
            $maker = Maker::factory()->create([
                'name' => $makerName,
            ]);

            // Create each model for this maker
            foreach ($models as $modelName) {
                CarModel::factory()->create([
                    'name' => $modelName,
                    'maker_id' => $maker->id, // Must be CarModel table
                ]);
            }
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
                    ->sequence(fn(Sequence $sequence) => ['position' => $sequence->index % 5 + 1]),
                    'images'
                )
                ->hasFeatures(),
                'favouriteCars'
            )
            ->create();
    }
}
