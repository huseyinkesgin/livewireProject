<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'state_id' => 1,
            'name' => 'Gebze',
            'slug' =>'gebze',
        ]);
        City::create([
            'state_id' => 1,
            'name' => 'Darıca',
            'slug' =>'darica',
        ]);
        City::create([
            'state_id' => 1,
            'name' => 'Çayırova',
            'slug' =>'cayirova',
        ]);

        City::create([
            'state_id' => 2,
            'name' => 'Pendik',
            'slug' =>'pendik',
        ]);
        City::create([
            'state_id' => 2,
            'name' => 'Ümraniye',
            'slug' =>'umraniye',
        ]);
        City::create([
            'state_id' => 2,
            'name' => 'Maltepe',
            'slug' =>'maltepe',
        ]);

        City::create([
            'state_id' => 3,
            'name' => 'Nilüfer',
            'slug' =>'nilufer',
        ]);
        City::create([
            'state_id' => 3,
            'name' => 'Yıldırırm',
            'slug' =>'yildirim',
        ]);
        City::create([
            'state_id' => 3,
            'name' => 'Gemlik',
            'slug' =>'gemlik',
        ]);

        City::create([
            'state_id' => 4,
            'name' => 'Hendek',
            'slug' =>'hendek',
        ]);
        City::create([
            'state_id' => 4,
            'name' => 'Adapazarı',
            'slug' =>'adapazari',
        ]);
        City::create([
            'state_id' => 1,
            'name' => 'Pamukova',
            'slug' =>'pamukova',
        ]);
    }
}
