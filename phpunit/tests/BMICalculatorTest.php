<?php

use PHPUnit\Framework\TestCase;

class BMICalculatorTest extends TestCase
{

    public function testShowsUnderweightBmiLessThen18()
    {
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 10;
        $result = $BMICalculator->getTextResultFromBMI();
        $expected = 'Underweight';
        $this->assertSame($expected, $result);
    }

    public function testShowsNormalWhenBmiBetween1825()
    {
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 24;
        $result = $BMICalculator->getTextResultFromBMI();
        $expected = 'Normal';
        $this->assertSame($expected, $result);
    }

    public function testShowsOverweightWhenBmiGreaterThen25()
    {
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 28;
        $result = $BMICalculator->getTextResultFromBMI();
        $expected = 'Overweight';
        $this->assertSame($expected, $result);
    }

    public function testCanCalculateCorrectBmi() {
        $expected = 39.1;
        $BMICalculator = new BMICalculator;
        $BMICalculator->mass = 100;
        $BMICalculator->height = 1.6;
        $result = $BMICalculator->calculate();
        $this->assertEquals($expected, $result);
        $this->assertEquals(BASEURL, 'http://localhost:8000');

    }
}
