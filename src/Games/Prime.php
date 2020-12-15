<?php

declare(strict_types=1);

namespace Brain\Games\Prime;

use function Brain\Games\Engine\startGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
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
    $generateRound = function (): array {
        $minNumber = 1;
        $maxNumber = 100;
        $question = rand($minNumber, $maxNumber);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';

        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    startGame(DESCRIPTION, $generateRound);
}
