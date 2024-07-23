<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $email = $faker->unique()->safeEmail;


        for ($i = 0; $i < 10; $i++) { // Nombre d'utilisateurs à créer
            $email = $faker->unique()->safeEmail;
            $existingUser = DB::table('users')->where('email', $email)->first();

            if (!$existingUser) {
                DB::table('users')->insert([
                    'name' => $faker->name,
                    'email' => $email,
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'), // Utiliser Hash::make pour hasher le mot de passe
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
