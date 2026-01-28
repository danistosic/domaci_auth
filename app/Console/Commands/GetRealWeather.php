<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to synchronize real life weather with our application using the Open API.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get(env('WEATHER_API_URL') . 'v1/forecast.json', [
            'key'  => env('WEATHER_API_KEY'),
            'q'    => $this->argument('city'),
            'aqi'  => 'no',
            'days' => 1,
        ]);

        $jsonResponse = $response->json(); // JSON => assoc array

        if (isset($jsonResponse['error'])) {
            $this->output->error($jsonResponse['error']['message']);
            return;
        }

        dd($jsonResponse);
    }
}
