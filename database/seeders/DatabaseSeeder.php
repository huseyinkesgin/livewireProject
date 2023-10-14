<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

use function Pest\Laravel\call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([      

            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,

        ]);

        \App\Models\User::factory(70)->create();
        \App\Models\Brand::factory(73)->create();
       
       

        \App\Models\User::factory()->create([
            'name' => 'Hüseyin Kesgin',
            'email' => 'iletisim@osatio.com',
            'password' => '$2y$10$Io3ynle8kXiy3cvZY7xyK.ULdjsyILv1RV7sX60zvg3e0cOIOuNpe',
            'created_at' =>Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
