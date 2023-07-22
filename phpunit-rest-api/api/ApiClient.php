<?php

namespace Api;

class ApiClient
{
    protected $httpClient;

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getPostcodeData(string $postcode)
    {
        return $this->httpClient->get('postcodes/' . $postcode);
    }

    public function getPostcodesData()
    {
        $postcodes = [
            'json' => [
                'postcodes' => ["OX49 5NU", "M32 0JG", "NE30 1DP"]
            ]
        ];

        return $this->httpClient->post('/postcodes', $postcodes);
    }
}
