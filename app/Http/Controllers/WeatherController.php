<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resources\Weather\Weather;
use App\DataRepositories\CitiesRepository;

class WeatherController extends Controller
{
    private $citiesRepository;

    private $weatherObj;

    public function __construct(CitiesRepository $citiesRepository, Weather $weatherObj)
    {
         $this->citiesRepository = $citiesRepository;

         $this->weatherObj = $weatherObj;
    }
    /**
     * Display a listing of the cities.
     *
     * @return \Illuminate\Http\Response
     */
    public function cities()
    {
        $result["data"] =  $this->citiesRepository->get();

        return response()->json($result, 200);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $city = $request->get("city");
        $cities = $this->citiesRepository->get();

        if (empty($city) || !in_array($city, $cities)) {
            $city = $cities[0];
        }

        $data = $this->weatherObj->handler($city);

        if (false === $data) {
            return response()->json([
                'error' => 'Data source error'
             ], 500);
        }

        $cityData = json_decode($data, true);

        $result["data"] = [
            "location" =>  $cityData["location"]["name"],
            "time" =>  date("l h:m A",strtotime($cityData["location"]["localtime"])),
            "temp_c" =>  $cityData["current"]["temp_c"],
            "wind_kph" =>  $cityData["current"]["wind_kph"],
            "weather" =>  $cityData["current"]["condition"]["text"],
        ];

        return response()->json($result, 200);
    }
}
