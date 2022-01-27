<?php

namespace App\Resources\Weather;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;

class Base
{
    protected $uri;

    protected $baseUri;

    protected $apiKey;

    protected $client;

    protected $query;

    public function __construct()
    {

        $this->baseUri = config('weather.base_uri');

        $this->apiKey = config('weather.api_key');

        $this->client = new Client(['base_uri' => $this->baseUri]);
    }

    /**
     * serUrl.
     *
     * @return response
     */
    public function setUri($uri)
    {

        if (null != $uri) {
            $this->uri = $uri;
        }

        return $uri;
    }

   /**
     * serQuery
     *
     * @return response
     */
    public function setQuery($query)
    {

        if (null != $query) {
            $this->query = $query;
        }

        return $query;
    }

    /**
     * get data.
     *
     * @return response
     */
    public function get()
    {

        $uri = $this->uri;

        $options = [
            'verify' => false,
            'query' => [
                "key" => $this->apiKey,
                "q" => $this->query,
                "api" => "no",
            ]
        ];


        try {
            $response = $this->client->request('GET', $uri, $options);

            return $response->getBody()->getContents();
        } catch (ClientException $e) {
            return false;
        }
    }
}
