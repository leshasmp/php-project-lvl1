<?php

declare(strict_types=1);

namespace Brain\Games\Progression;

use function Brain\Games\Engine\startGame;

const DESCRIPTION_PROGRESSION = 'What number is missing in the progression?';

function runGame(): void
{
    $createDescription = function (): array {

        $minFirstNumber = 1;
        $minLastNumber = 100;
        $startNumber = rand($minFirstNumber, $minLastNumber);

        $minProgressionNumber = 1;
        $maxProgressionNumber = 9;
        $progressionIndex = rand($minProgressionNumber, $maxProgressionNumber);

        $minLengthNumber = 5;
        $maxLengthNumber = 10;
        $lengthProgression = rand($minLengthNumber, $maxLengthNumber);

        $minIndexQuestionNumber = 0;
        $indexQuestion = rand($minIndexQuestionNumber, $lengthProgression - 1);

        $numbers = [];

        for ($i = 0; $i < $lengthProgression; $i++) {
            if ($i == 0) {
                $numbers[$i] = $startNumber;
            } else {
                $numbers[$i] = $numbers[$i - 1] + $progressionIndex;
            }
        }

        $correctAnswer = $numbers[$indexQuestion];

        $numbers[$indexQuestion] = '..';

        $question = implode(' ', $numbers);

        return ['question' => $question, 'correctAnswer' => (int) $correctAnswer];
    };

    startGame(DESCRIPTION_PROGRESSION, $createDescription);
}
