<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\startGame;

function primeGame()
{
    $questionText = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $condition = function (): array {

        $question = rand(1, 100);

        $checkPrimeNumber = function ($num): bool {
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
        };

        $correctAnswer = $checkPrimeNumber($question) ? 'yes' : 'no';

        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    startGame($questionText, $condition);
}
