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

function calcGame(): void
{
    $questionText = 'What is the result of the expression?';
    $condition = function (): array {
        $operators = array('+', '-', '*');
        $randomKey = array_rand($operators, 1);
        $randomOperator = $operators[$randomKey];
        $randomNumber1 = rand(1, 100);
        $randomNumber2 = rand(1, 100);
        $question = "{$randomNumber1} {$randomOperator} {$randomNumber2}";
        $correctAnswer = getExpression($randomNumber1, $randomOperator, $randomNumber2);
        return ['question' => $question, 'correctAnswer' => (int) $correctAnswer];
    };

    startGame($questionText, $condition);
}
