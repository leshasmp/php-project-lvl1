<?php

declare(strict_types=1);

namespace Brain\Games\Progression;

use function Brain\Games\Engine\startGame;

const PROGRESSION = 'What number is missing in the progression?';

function runGame(): void
{
    $generateRound = function (): array {
        $startNumber = rand(1, 10);
        $progressionIndex = rand(1, 9);
        $progressionLength = rand(5, 10);
        $minIndexQuestionNumber = 0;
        $hiddenElementIndex = rand($minIndexQuestionNumber, $progressionLength - 1);
        $hideSymbol = '..';

        for ($i = 0; $i < $progressionLength; $i++) {
            if ($i == 0) {
                $numbers[$i] = $startNumber;
            } else {
                $numbers[$i] = $startNumber + $i * $progressionIndex;
            }
            if ($i == $hiddenElementIndex) {
                $numbers[$i] = $hideSymbol;
                $correctAnswer = $startNumber + $i * $progressionIndex;
            }
        }

        $question = implode(' ', $numbers);
        return ['question' => $question, 'correctAnswer' => (string) $correctAnswer];
    };

    startGame(PROGRESSION, $generateRound);
}
