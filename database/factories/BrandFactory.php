<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->word;
        $slug = Str::slug($name);
        $arrayValues = ['0','1'];
        
        return [
            'name' => $name,
            'slug' => $slug,
            'isActive' =>  fake()->randomElement($arrayValues),
            'isDeleted' =>  fake()->randomElement($arrayValues),
            'image' => "default_logo.png",
            'description' => fake()->paragraph(),
            'note' => fake()->paragraph(),
            'created_at' =>Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
