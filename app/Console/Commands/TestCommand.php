<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for testing live weather API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $city = $this->argument('city'); // Get city argument

        $response = Http::get('https://api.weatherapi.com/v1/current.json', [
            'key' => env('WEATHER_API_KEY'),
            'q'   => $city,
            'aqi' => 'no',
        ]);

        $jsonResponse = $response->json(); // JSON => assoc array

        if (isset($jsonResponse['error'])) {
            $this->output->error($jsonResponse['error']['message']);
            return;
        }

        $this->info("Temperature in {$city}: " . $jsonResponse['current']['temp_c'] . "°C");
    }
}
