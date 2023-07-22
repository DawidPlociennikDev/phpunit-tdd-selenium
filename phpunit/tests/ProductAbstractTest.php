<?php

use PHPUnit\Framework\TestCase;

class ProductAbstractTest extends TestCase
{
    public function testProductAbstract() 
    {
        $productAbstract = new class extends ProductAbstract {};
        $this->assertSame('done!', $productAbstract->doSomething());
    }
}