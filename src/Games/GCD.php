<?php

namespace Brain\Games\GCD;

use function Brain\Games\Engine\startGame;

function gcd($a, $b): int
{
    while ($a != $b) {
        if ($a > $b) {
            $a = $a - $b;
        } else {
            $b = $b - $a;
        }
    }
    return $a;
}

function GCDGame()
{
    $questionText = 'Find the greatest common divisor of given numbers.';
    $condition = function (): array {
        $randomNumber1 = rand(1, 100);
        $randomNumber2 = rand(1, 100);
        $question = "{$randomNumber1} {$randomNumber2}";
        $correctAnswer = gcd($randomNumber1, $randomNumber2);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    startGame($questionText, $condition);
}
