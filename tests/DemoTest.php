<?php

use PHPUnit\Framework\TestCase;
use Fernando\Questionaire\Functions;



class DemoTest extends TestCase
{
    public $functions;
    protected function setUp(): void
    {
        $this->functions = new Functions();
    }

    public function testStartEqualsStop()
    {
        $result = $this->functions->fizzBuzz(3, 3);
        $expected = 'Fizz';
        $this->assertEquals($expected, $result);
    }

    public function testNegativeStop()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->functions->fizzBuzz(1, -5);
    }

    public function testNoMultiples()
    {
        $result = $this->functions->fizzBuzz(7, 8);
        $this->assertEquals('78', $result);
    }

    public function testDefaultRange()
    {
        $result = $this->functions->fizzBuzz();
        $this->assertStringContainsString('Fizz', $result);
        $this->assertStringContainsString('Buzz', $result);
        $this->assertStringContainsString('FizzBuzz', $result);
    }

    public function testBothNegative()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->functions->fizzBuzz(-1, -5);
    }

    public function testMultiplesOf3And5()
    {
        $result = $this->functions->fizzBuzz(1, 3);
        $expected = '12Fizz';
        $this->assertEquals($expected, $result);
    }

    public function testNegativeStart()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->functions->fizzBuzz(-1, 5);
    }

    public function testStartGreaterThanStop()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->functions->fizzBuzz(10, 5);
    }

}
