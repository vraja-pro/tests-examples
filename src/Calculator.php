<?php
namespace PHPUnit_Demo;
/**
 * Example class.
 */
class Calculator {

    /**
     * Add two numbers.
     *
     * @param int $a
     * @param int $b
     * @return void
     */
    public function add($a, $b) {
        return $a + $b;
    }

    /**
     * Subtract two numbers.
     *
     * @param int $a
     * @param int $b
     * @return void
     */
    public function subtract($a, $b) {
        return $a - $b;
    }

    /**
     * Divide numbers.
     *
     * @param int $a
     * @param int $b
     * @return void
     */
    public function divide($a, $b) {
        if($b === 0) {
            echo "Division by zero is not allowed.";
        }
        return $b/$a;
    }
}