<?php

declare(strict_types=1);

namespace Brain\Games\Progression;

use function Brain\Games\Engine\startGame;

function game(): void
{
    $questionText = 'What number is missing in the progression?';
    $condition = function (): array {

        // получаем минимальное последнее число
        $countNumbers = 10;
        $maxRandomNumber = 100;
        $minRandomNumber = 1;
        $progressionIndex = 3;
        for ($i = 1; $i <= $countNumbers; $i++) {
            $minRandomNumber = $minRandomNumber + $progressionIndex;
        }

        $lastNumber = rand($minRandomNumber, $maxRandomNumber + $progressionIndex);
        $numbers = [];

        $minNumber = 0;
        $maxNumber = 9;
        $randomIndex = rand($minNumber, $maxNumber);
        $correctAnswer = 0;

        // записываем в массив $numbers 10 чисел начиная с последнего
        for ($i = 0; $i < $countNumbers; $i++) {
            $lastNumber = $lastNumber - $progressionIndex;
            $numbers[$i] = $lastNumber;
            if ($i == $randomIndex) {
                $numbers[$randomIndex] = '..';
                $correctAnswer = $lastNumber;
            }
        }

        $numbers = array_reverse($numbers);
        $question = implode(' ', $numbers);

        return ['question' => $question, 'correctAnswer' => (int) $correctAnswer];
    };

    startGame($questionText, $condition);
}
