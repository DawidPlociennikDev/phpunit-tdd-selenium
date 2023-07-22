<?php

namespace Api;

class ApiClient2 
{
    protected $httpClient;

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getPost(int $postID)
    {
        return $this->httpClient->get('posts/'.$postID);
    }

    public function addPost($post)
    {
        $post = [
            'json' => $post
        ];
        return $this->httpClient->post('posts', $post);
    }

    public function deletePost($id)
    {
        return $this->httpClient->delete('posts/'.$id);
    }

    public function updatePost($id, $patch)
    {
        $patch = [
            'json' => $patch
        ];

        $response = $this->httpClient->patch('posts/'.$id, $patch);
    }

    public function replacePost($id, $post) 
    {
        $post = [
            'json' => $post
        ];

        $response = $this->httpClient->put('posts/'.$id, $post);
    }
}