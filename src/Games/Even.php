<?php

declare(strict_types=1);

namespace Brain\Games\Even;

use function Brain\Games\Engine\startGame;

function game(): void
{
    $questionText = 'Answer "yes" if the number is even, otherwise answer "no".';
    $condition = function (): array {
        $minNumber = 1;
        $maxNumber = 100;
        $question = rand($minNumber, $maxNumber);
        if ($question % 2 == 0) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    startGame($questionText, $condition);
}
