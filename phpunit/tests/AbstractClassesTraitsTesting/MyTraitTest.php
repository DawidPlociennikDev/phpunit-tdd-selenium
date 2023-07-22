<?php

use PHPUnit\Framework\TestCase;
use forTestingAbstractClassesAndTraits\MyTrait;

class MyTraitTest extends TestCase
{
    public function testMyMethod(): void
    {
        $mock = $this->getMockBuilder(MyTrait::class)
            ->getMockForTrait();

        $this->assertSame(20, $mock->traitMethod(10));
    }
}
