<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++) {
            Film::create([
                'title' => fake()->words(rand(1, 5), true),
                'price' => rand(1, 3),
                'director' => fake()->name(),
                'description' => fake()->paragraph(2, false),
                'img' => fake()->imageUrl(200, 300),
                'user_id' => rand(1, 5),
            ]);
        }
    }
}
