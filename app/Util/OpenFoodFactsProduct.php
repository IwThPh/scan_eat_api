<?php

namespace App\Util;

use GuzzleHttp\Client;

class OpenFoodFactsProduct
{

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getProduct($barcode)
    {
        return $this->endpointRequest('product/' . $barcode . '.json');
    }

    public function endpointRequest($url)
    {
        try {
            $response = $this->client->request('GET', $url);
        } catch (\Exception $e) {
            return [];
        }
        return $this->responseHandler($response->getBody()->getContents());
    }

    public function responseHandler($response)
    {
        if ($response) {
            return json_decode($response);
        }
        return [];
    }
}
