<?php

declare(strict_types=1);

namespace Brain\Games\Calc;

use function Brain\Games\Engine\startGame;

define('DESCRIPTION_CALCULATE', 'What is the result of the expression?');

function calculate($operator, $num1, $num2): int
{
    switch ($operator) {
        case "+":
            return $num1 + $num2;
        case "-":
            return $num1 - $num2;
        case "*":
            return $num1 * $num2;
        default:
            throw new \Exception("Unknown operator value: $operator!");
    }
}

function runGame(): void
{
    $condition = function (): array {
        $operators = array('+', '-', '*');
        $randomOperator = $operators[array_rand($operators)];
        $minNumber = 1;
        $maxNumber = 100;
        $randomNumber1 = rand($minNumber, $maxNumber);
        $randomNumber2 = rand($minNumber, $maxNumber);
        $question = "{$randomNumber1} {$randomOperator} {$randomNumber2}";
        $correctAnswer = calculate($randomOperator, $randomNumber1, $randomNumber2);
        return ['question' => $question, 'correctAnswer' => (int) $correctAnswer];
    };

    startGame(DESCRIPTION_CALCULATE, $condition);
}
