<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        State::create([
            'country_id' => 1,
            'name' => 'Kocaeli',
            'slug' =>'kocaeli',
            'number_plate' => '41'
        ]);
        State::create([
            'country_id' => 1,
            'name' => 'İstanbul',
            'slug' =>'istanbul',
            'number_plate' => '34'
        ]);
        State::create([
            'country_id' => 1,
            'name' => 'Bursa',
            'slug' =>'bursa',
            'number_plate' => '16'
        ]);
        State::create([
            'country_id' => 1,
            'name' => 'Sakarya',
            'slug' =>'sakarya',
            'number_plate' => '54'
        ]);
    }
}
