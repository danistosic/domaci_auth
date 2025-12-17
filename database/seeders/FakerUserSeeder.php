<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FakerUserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Tražimo email
        $email = $this->command->getOutput()->ask('Koju email adresu zelite da registrujete?');

        if ($email === null || trim($email) === '') {
            $this->command->getOutput()->error('Niste uneli mail adresu!');
            return;
        }

        // 2. Tražimo lozinku
        $password = $this->command->getOutput()->ask('Koju lozinku zelite da stavite za nalog?');

        if ($password === null || trim($password) === '') {
            $this->command->getOutput()->error('Niste uneli lozinku!');
            return;
        }

        // 3. Tražimo korisničko ime
        $username = $this->command->getOutput()->ask('Koje korisnicko ime zelite da postavite?');

        if ($username === null || trim($username) === '') {
            $this->command->getOutput()->error('Niste uneli korisnicko ime!');
            return;
        }

        // 4. Provjera postoji li korisnik
        $user = User::where('email', $email)->first();

        if ($user instanceof User) {
            $this->command->getOutput()->error('Korisnik sa ovom email adresom vec postoji!');
            return;
        }

        // 5. Ako ne postoji — kreiramo ga
        User::create([
            'email' => $email,
            'name' => $username,
            'password' => Hash::make($password),
        ]);

        $this->command->getOutput()->info("Uspesno ste kreirali korisnika {$username} sa email adresom {$email}!");
    }
}
