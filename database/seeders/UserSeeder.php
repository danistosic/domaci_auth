<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Koliko korisnika želimo napraviti
        $amount = $this->command
            ->getOutput()
            ->ask('Koliko korisnika zelite da napravite?', 500);

        // Koja šifra će biti za sve korisnike
        $password = $this->command
            ->getOutput()
            ->ask('Koja sifra treba biti?', '123456');

        // Faker instanca
        $faker = Factory::create();

        // Progress bar
        $this->command->getOutput()->progressStart($amount);

        for ($i = 0; $i < $amount; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make($password),
            ]);

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}



