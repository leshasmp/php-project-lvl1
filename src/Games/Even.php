<?php

declare(strict_types=1);

namespace Brain\Games\Even;

use function Brain\Games\Engine\startGame;

define('DESCRIPTION_EVEN', 'Answer "yes" if the number is even, otherwise answer "no".');

function checkEvenNumber(int $number): string
{
    return $number % 2 == 0 ? 'yes' : 'no';
}

function runGame(): void
{
    $condition = function (): array {
        $minNumber = 1;
        $maxNumber = 100;
        $question = rand($minNumber, $maxNumber);
        $correctAnswer = checkEvenNumber($question);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    startGame(DESCRIPTION_EVEN, $condition);
}
