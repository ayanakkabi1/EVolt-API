<?php

namespace Database\Seeders;

use App\Models\ChargingStation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChargingStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChargingStation::create([
            'name' => 'Station Alpha',
            'latitude' => 48.8566,
            'longitude' => 2.3522,
            'connector_type' => 'Type 2',
            'is_available' => true,
        ]);

        ChargingStation::create([
            'name' => 'Station Beta',
            'latitude' => 48.8626,
            'longitude' => 2.2913,
            'connector_type' => 'CCS',
            'is_available' => true,
        ]);

        ChargingStation::create([
            'name' => 'Station Gamma',
            'latitude' => 48.8412,
            'longitude' => 2.4013,
            'connector_type' => 'Type 2',
            'is_available' => false,
        ]);
    }
}
