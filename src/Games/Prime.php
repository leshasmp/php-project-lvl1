<?php

declare(strict_types=1);

namespace Brain\Games\Prime;

use function Brain\Games\Engine\startGame;

define('DESCRIPTION_PRIME', 'Answer "yes" if given number is prime. Otherwise answer "no".');

function checkPrimeNumber(int $num): bool
{
    if ($num == 2) {
        return true;
    }
    if ($num % 2 == 0) {
        return false;
    }
    $i = 3;
    $max_factor = (int)sqrt($num);
    while ($i <= $max_factor) {
        if ($num % $i == 0) {
            return false;
        }
        $i += 2;
    }
    return true;
}

function runGame(): void
{
    $condition = function (): array {

        $minNumber = 1;
        $maxNumber = 100;
        $question = rand($minNumber, $maxNumber);
        $correctAnswer = checkPrimeNumber($question) ? 'yes' : 'no';

        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    startGame(DESCRIPTION_PRIME, $condition);
}
