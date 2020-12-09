<?php

declare(strict_types=1);

namespace Brain\Games\Progression;

use function Brain\Games\Engine\startGame;

define('DESCRIPTION_PROGRESSION', 'What number is missing in the progression?');

function runGame(): void
{
    $condition = function (): array {

        $countNumbers = 10;
        $maxRandomNumber = 100;
        $minRandomNumber = 31;
        $progressionIndex = 3;
        $minNumber = 0;
        $maxNumber = 9;
        $randomIndex = rand($minNumber, $maxNumber);
        $lastNumber = rand($minRandomNumber, $maxRandomNumber + $progressionIndex);
        $correctAnswer = 0;
        $numbers = [];

        for ($i = 0; $i < $countNumbers; $i++) {
            $lastNumber = $lastNumber - $progressionIndex;
            $numbers[$i] = $lastNumber;
            if ($i == $randomIndex) {
                $numbers[$randomIndex] = '..';
                $correctAnswer = $lastNumber;
            }
        }

        $question = implode(' ', array_reverse($numbers));

        return ['question' => $question, 'correctAnswer' => (int) $correctAnswer];
    };

    startGame(DESCRIPTION_PROGRESSION, $condition);
}
