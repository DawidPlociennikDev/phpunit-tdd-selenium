<?php

class Product extends ProductAbstract
{

    protected $addLoggerCallable = [Logger::class, 'log'];

    public function setLoggerCallable(callable $callable)
    {
        $this->addLoggerCallable = $callable;
    }

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function fetchProductById($id)
    {
        // call the database to fech the product
        $product = 'product 1';
        $this->session->write($product);
        // Logger::log($product);
        call_user_func($this->addLoggerCallable, $product);
        return $product;
    }
}
