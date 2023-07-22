<?php

class Session implements SessionInterface
{
    public function open() 
    {
        echo 'real opening the session';
    }
    public function close() 
    {
        echo 'real closing the session';
    }
    public function write($product)
    {
        echo 'real writing to the session ' . $product;
    }
}