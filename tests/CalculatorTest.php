<?php
namespace PHPUnit_Demo\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit_Demo\Calculator;
/**
 * Tests for the Calculator class.
 * 
 * @coversDefaultClass \PHPUnit_Demo\Calculator
 */
class CalculatorTest extends TestCase {
    private $calculator;

    protected function setUp(): void {
        $this->calculator = new Calculator();
    }

    protected function tearDown(): void {
        $this->calculator = null;
    }

    /**
     * Tests for Arithmetic operations.
     * 
     * @covers \PHPUnit_Demo\Calculator::add
     * @covers \PHPUnit_Demo\Calculator::subtract
     * @covers \PHPUnit_Demo\Calculator::divide
     *
     * @return void
     */
    public function testArithmeticOperations() {
        $addResult = $this->calculator->add(10, 5);
        $this->assertTrue($addResult === 15, "Addition result should be 15");

        $subtractResult = $this->calculator->subtract(10, 5);
        $this->assertTrue($subtractResult === 5, "Subtraction result should be 5");

        $divide_result = $this->calculator->divide(5, 10);
        $this->assertTrue($divide_result === 2, "Division result should be 2");
    }
}