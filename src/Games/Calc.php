<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\startGame;

function calcGame()
{
    $questionText = 'What is the result of the expression?';
    $condition = function (): array {
        $randomOperators = array('+', '-', '*');
        $randomOperator = $randomOperators[rand(0, 2)];
        $randomNumber1 = rand(1, 100);
        $randomNumber2 = rand(1, 100);
        $question = "{$randomNumber1} {$randomOperator} {$randomNumber2}";
        $correctAnswer = eval("return $question;");
        return ['question' => $question, 'correctAnswer' => (int) $correctAnswer];
    };

    startGame($questionText, $condition);
}
