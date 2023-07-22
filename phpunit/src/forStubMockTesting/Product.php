<?php

namespace forStubMockTesting;

class Product
{
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function saveProduct($name, $price)
    {
       if (!is_string($name)) 
       {
        $this->logger->log('error', 'Invalid name');
        return false;
       }
       elseif (!is_int($price))
       {
        $this->logger->log('error', 'Invalid price');
        return false;
       }

       if ($price > 10) 
       {
        $this->logger->log('notice', 'Price greater than 10');
       }

       $this->logger->log('success', 'Product was saved');
       return true;
    }
}