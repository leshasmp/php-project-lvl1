<?php

declare(strict_types=1);

namespace Brain\Games\Even;

use function Brain\Games\Engine\startGame;

const DESCRIPTION_EVEN = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 == 0 ;
}

function runGame(): void
{
    $createDescription = function (): array {
        $minNumber = 1;
        $maxNumber = 100;
        $question = rand($minNumber, $maxNumber);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    startGame(DESCRIPTION_EVEN, $createDescription);
}
