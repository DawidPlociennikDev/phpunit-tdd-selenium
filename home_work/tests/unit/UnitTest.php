<?php

use App\Greeting;

class UnitTest extends PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider hoursProvider
     */
    public function testGoodMorningGreetings(int $hour, string $expected)
    {
        $greeting = new Greeting($hour);
        $result = $greeting->getGreeting();
        $this->assertSame($expected, $result);
    }

    public static function hoursProvider() {
        return [
            [0, 'Good night'],
            [1, 'Good night'],
            [2, 'Good night'],
            [3, 'Good night'],
            [4, 'Good night'],
            [5, 'Good morning'],
            [6, 'Good morning'],
            [7, 'Good morning'],
            [8, 'Good morning'],
            [9, 'Good morning'],
            [10, 'Good morning'],
            [11, 'Good morning'],
            [12, 'Good afternoon'],
            [13, 'Good afternoon'],
            [14, 'Good afternoon'],
            [15, 'Good afternoon'],
            [16, 'Good afternoon'],
            [17, 'Good evening'],
            [18, 'Good evening'],
            [19, 'Good evening'],
            [20, 'Good evening'],
            [21, 'Good evening'],
            [22, 'Good evening'],
            [23, 'Good evening'],
        ];
    }
}
