<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Weather;
use App\Models\UserWeather;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Pitaj email
        $email = $this->command->getOutput()->ask('Unesite email korisnika');

        if ($email === null || trim($email) === '') {
            $this->command->getOutput()->error('Niste unijeli email!');
            return;
        }

        // 2) Provjera: korisnik postoji?
        $korisnik = User::where('email', $email)->first();

        if (!$korisnik) {
            $this->command->getOutput()->error("Korisnik s emailom '{$email}' ne postoji!");
            return;
        }

        // 3) Pitaj grad
        $grad = $this->command->getOutput()->ask('Unesite ime grada');

        if ($grad === null || trim($grad) === '') {
            $this->command->getOutput()->error('Niste unijeli ime grada!');
            return;
        }

        // 4) Provjera: grad postoji u weather tablici?
        $vrijeme = Weather::where('city', $grad)->first();

        if (!$vrijeme) {
            $this->command->getOutput()->error("Grad '{$grad}' ne postoji u tablici weather!");
            return;
        }

        // 5) Upis u user_weather (veza user + weather)
        UserWeather::firstOrCreate([
            'user_id' => $korisnik->id,
            'weather_id' => $vrijeme->id,
        ]);

        // 6) Poruka
        $this->command->getOutput()->info(
            "Uspješno povezano: {$korisnik->email} -> {$vrijeme->city} ({$vrijeme->temperature}°)"
        );
    }
}



