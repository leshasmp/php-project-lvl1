<?php

declare(strict_types=1);

namespace Brain\Games\Calc;

use function Brain\Games\Engine\startGame;

function getExpression($num1, $operator, $num2): int
{
    switch ($operator) {
        case "+":
            return $num1 + $num2;
        case "-":
            return $num1 - $num2;
        case "*":
            return $num1 * $num2;
    }
}

function game(): void
{
    $questionText = 'What is the result of the expression?';
    $condition = function (): array {
        $operators = array('+', '-', '*');
        $randomKey = array_rand($operators, 1);
        $randomOperator = $operators[$randomKey];
        $minNumber = 1;
        $maxNumber = 100;
        $randomNumber1 = rand($minNumber, $maxNumber);
        $randomNumber2 = rand($minNumber, $maxNumber);
        $question = "{$randomNumber1} {$randomOperator} {$randomNumber2}";
        $correctAnswer = getExpression($randomNumber1, $randomOperator, $randomNumber2);
        return ['question' => $question, 'correctAnswer' => (int) $correctAnswer];
    };

    startGame($questionText, $condition);
}
