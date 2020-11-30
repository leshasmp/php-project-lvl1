<?php

declare(strict_types=1);

namespace Brain\Games\Even;

use function Brain\Games\Engine\startGame;

function evenGame()
{
    $questionText = 'Answer "yes" if the number is even, otherwise answer "no".';
    $condition = function (): array {
        $question = rand(1, 100);
        if ($question % 2 == 0 && $question >= 2) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        return ['question' => (int) $question, 'correctAnswer' => $correctAnswer];
    };

    startGame($questionText, $condition);
}
