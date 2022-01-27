<?php

namespace App\Resources\Weather;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use App\Resources\Weather\Base;

class Weather extends Base
{
    public function __construct()
    {
        parent::__construct();

        $this->uri = "/v1/current.json";
    }



    /**
     * get data.
     *
     * @return response
     */
    public function handler($city)
    {
        $this->setQuery($city);
        return $this->get();
    }
}
