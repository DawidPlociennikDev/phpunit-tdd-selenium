<?php

use Api\ApiClient2;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ApiClient2Test extends TestCase
{
    protected $httpClient;
    protected $apiClient;

    public function setUp(): void
    {
        $this->httpClient = new Client(['base_uri' => 'http://localhost:3000/']);
        $this->apiClient = new ApiClient2($this->httpClient);
    }

    public function tearDown(): void
    {
        $this->httpClient = null;
        $this->apiClient = null;
    }

    public function testShowPost()
    {
        $response = $this->apiClient->getPost(1);
        $this->assertEquals(200, $response->getStatusCode());
        
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('title', $data);
    }

    public function testAddPost() 
    {
        $this->apiClient->addPost(['id' => 2, 'title' => 'title2', 'author' => 'author2']);

        $response = $this->apiClient->getPost(2);
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('title', $data);
        $this->assertEquals($data['title'], 'title2');
    }

    /**
     * @depends testAddPost
     */
    public function testDeletePost() 
    {
        $response = $this->apiClient->deletePost(2);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testUpdatePost()
    {
        $this->apiClient->updatePost(1, ['title'=>'json-server2']);
        $response = $this->apiClient->getPost(1);
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('title', $data);
        $this->assertEquals($data['title'], 'json-server2');

    }

    public function testReplacePost()
    {
        $this->apiClient->replacePost(1, ['id' => 1, 'title'=>'title2', 'author' => 'author2']);
        $response = $this->apiClient->getPost(1);
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('title', $data);
        $this->assertEquals($data['title'], 'title2');

    }
}
