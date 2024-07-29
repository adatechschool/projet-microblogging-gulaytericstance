<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Factory as Faker;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) { // Nombre d'utilisateurs à créer
            Post::create([
                'userId' => $faker->numberBetween(1, 10),
                'description' => $faker->paragraph(3),
            ]);
    }
}}