<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherControllerTest extends TestCase
{
    /**
     * test cities api
     *
     * @return void
     */
    public function testCities()
    {
        $response = $this->get('/api/cities');

        $response->assertStatus(200)
        ->assertJsonStructure([
            "data"
        ]);
    }

    /**
     * test cities api
     *
     * @return void
     */
    public function testWeather()
    {
        $response = $this->get('/api/weather');

        $response->assertStatus(200)
        ->assertJsonStructure([
            "data" => [
                    "location",
                    "time",
                    "temp_c",
                    "wind_kph",
                    "weather"
                ]
        ]);
    }
}
