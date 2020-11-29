<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\startGame;

function progressionGame()
{
    $questionText = 'What number is missing in the progression?';
    $condition = function (): array {

        // получаем минимальное последнее число
        $countNumbers = 10;
        $maxRandomNumber = 100;
        $minRandomNumber = 1;
        for ($i = 1; $i <= $countNumbers; $i++) {
            $minRandomNumber = $minRandomNumber + 3;
        }

        $lastNumber = rand($minRandomNumber, $maxRandomNumber + 3);
        $numbers = [];
        $randomIndex = rand(0, 9);
        $correctAnswer = 0;

        // записываем в массив $numbers 10 чисел начиная с последнего
        for ($i = 0; $i < $countNumbers; $i++) {
            $lastNumber = $lastNumber - 3;
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
