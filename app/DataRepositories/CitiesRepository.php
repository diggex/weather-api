<?php

namespace App\DataRepositories;

use App\DataRepositories\DataRepositoryInterface;

class CitiesRepository implements DataRepositoryInterface
{
    /*
     *
     * Get cities data from json file
     *
     */
    public function get()
    {

        $cities = json_decode(file_get_contents(base_path() . "/data/cities.json"), true);

        return $cities["data"];
    }
}
