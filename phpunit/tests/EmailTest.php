<?php

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{

    /**
     * @dataProvider emailsProvider
     */

    public function testValidEmail($email)
    {
        $this->assertMatchesRegularExpression('/^.+\@\S+\.\S+$/', $email);
    }

    public static function emailsProvider()
    {
        return [
            ['dsdsd@fdfd.df'],
            ['fdfdf@fdf.gdfdgf'],
            ['fdssfd@fdsdf.dom']
        ];
    }

    /**
     * @dataProvider numbersProvider
     */
    public function testMath($a, $b, $expected)
    {
        $result = $a * $b;
        $this->assertEquals($expected, $result);
    }

    public static function numbersProvider()
    {
        return [
            [1, 2, 2],
            [2, 2, 4],
            [3, 3, 9],
        ];
    }
}
