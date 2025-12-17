<?php

namespace Database\Seeders;

use App\Models\Cities;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            "Zagreb",
            "Split",
            "Rijeka",
            "Osijek",
            "Zadar",
            "Pula",
            "Slavonski Brod",
            "Karlovac",
            "Varaždin",
            "Šibenik",
            "Dubrovnik",
            "Čakovec",
            "Vinkovci",
            "Vukovar",
            "Sisak",
            "Bjelovar",
            "Koprivnica",
            "Virovitica",
            "Požega",
            "Krapina",
            "Gospić",
            "Petrinja",
            "Makarska",
            "Trogir",
            "Umag",
            "Poreč",
            "Vodice",
            "Metković",
            "Đakovo",
            "Knin",
            "Sinj",
            "Kaštela",
            "Solin",
            "Opatija",
            "Crikvenica",
            "Novi Vinodolski",
            "Rovinj",
            "Labin",
            "Imotski",
            "Korčula",
            "Otočac",
            "Pag",
            "Rab",
            "Valpovo",
            "Županja",
            "Novska",
            "Kutina",
            "Delnice",
            "Karlobag",
            "Nin"
        ];

        foreach ($cities as $city) {
            Cities::create([
                'name' => $city
            ]);
        }
    }
}
