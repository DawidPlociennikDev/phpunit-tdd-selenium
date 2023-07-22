<?php

use PHPUnit\Framework\TestCase;

class UsefullAssertionsTest extends TestCase
{
    public function testAssertSame()
    {
        $expected = 'baz';
        $result = 'baz';
        $this->assertSame($expected, $result);
    }

    public function testAssertEquals()
    {
        $expected = 1;
        $result = 1;
        $this->assertEquals($expected, $result);
    }

    public function testAssertEmpty()
    {
        $this->assertEmpty([]);
    }

    public function testAssertNull()
    {
        $this->assertNull(null);
    }

    public function testAssertGreaterThan()
    {
        $expected = 2;
        $result = 3;
        $this->assertGreaterThan($expected, $result);
    }

    public function testAssertFalse()
    {
        $this->assertFalse(false);
    }

    public function testAssertTrue()
    {
        $this->assertTrue(true);
    }

    public function testAssertCount()
    {
        $this->assertCount(3, [1, 2, 3]);
    }

    public function testAssertContains()
    {
        $this->assertContains(4, [1, 2, 3, 4]);
    }

    public function testAssertStringContainsString()
    {
        $searchFor = 'foo';
        $searchIn = 'bazfoo';
        $this->assertStringContainsString($searchFor, $searchIn);
    }

    public function testAssertInstanceOf()
    {
        $this->assertInstanceOf(Exception::class, new RuntimeException);
    }

    public function testAssertArrayHasKey()
    {
        $this->assertArrayHasKey('baz', ['baz' => 'bar']);
    }

    public function testAssertDirectoryIsWritabale()
    {
        $this->assertDirectoryIsWritable('directories');
    }

    public function testAssertFileIsWritabale()
    {
        $this->assertFileIsWritable('src/BMICalculator.php');
    }
}
