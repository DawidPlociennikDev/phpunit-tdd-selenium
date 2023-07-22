<?php

use Api\ApiClient;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;

class ApiClientTest extends TestCase
{
    protected $httpClient;
    protected $apiClient;
    protected $mockHandler;

    public function setUp(): void
    {
        // $this->httpClient = new Client(['base_uri' => 'http://api.postcodes.io/']);
        $this->mockHandler = new MockHandler();
        $this->httpClient = new Client([
            'handler' => $this->mockHandler
        ]);
        $this->apiClient = new ApiClient($this->httpClient);
    }

    public function tearDown(): void
    {
        $this->httpClient = null;
        $this->apiClient = null;
    }

    public function testShowPostcodeData()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . '/fixtures/postcode.json')));
        $response = $this->apiClient->getPostcodeData('OX49 5NU');
        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('admin_district', $data['result']);
    }

    public function testShowPostcodesData()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__. '/fixtures/postcodes.json')));
        $response = $this->apiClient->getPostcodesData(["OX49 5NU", "M32 0JG", "NE30 1DP"]);
        $data = json_decode($response->getBody(), true);
        $this->assertCount(3, $data['result']);
    }
}
