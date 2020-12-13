<?php

declare(strict_types=1);

namespace Brain\Games\GCD;

use function Brain\Games\Engine\startGame;

const DESCRIPTION_GCD = 'Find the greatest common divisor of given numbers.';

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

function runGame(): void
{
    $createDescription = function (): array {
        $minNumber = 1;
        $maxNumber = 100;
        $randomNumber1 = rand($minNumber, $maxNumber);
        $randomNumber2 = rand($randomNumber1, $maxNumber);
        $question = "{$randomNumber1} {$randomNumber2}";
        $correctAnswer = gcd($randomNumber1, $randomNumber2);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    startGame(DESCRIPTION_GCD, $createDescription);
}
