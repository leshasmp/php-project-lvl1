<?php

namespace Brain\Games\Game;

use function cli\line;
use function Brain\Games\Engine\checkAnswer;
use function Brain\Games\Engine\finishGame;
use function Brain\Games\Engine\gcd;

function starCalculateGame($name, $roundGame = 0)
{
    if (!$roundGame) {
        line('What is the result of the expression?');
        $roundGame = 1;
    }

    $randomOperators = array('+', '-', '*');
    $randomOperator = $randomOperators[rand(0, 2)];
    $randomNumber1 = rand(1, 100);
    $randomNumber2 = rand(1, 100);
    $question = "{$randomNumber1} {$randomOperator} {$randomNumber2}";
    $correctAnswer = eval('return ' . $question . ';');

    $resultAnswer = checkAnswer($question, $correctAnswer, $name);
    if ($resultAnswer) {
        if ($roundGame == 3) {
            finishGame($name);
            exit();
        }
        starCalculateGame($name, $roundGame + 1);
    } else {
        starCalculateGame($name, 1);
    }
}

function startEvenGame($name, $roundGame = 0)
{
    if (!$roundGame) {
        line('Answer "yes" if the number is even, otherwise answer "no".');
        $roundGame = 1;
    }

    $question = rand(1, 100);
    if ($question % 2 == 0 && $question >= 2) {
        $correctAnswer = 'yes';
    } else {
        $correctAnswer = 'no';
    }

    $resultAnswer = checkAnswer($question, $correctAnswer, $name);
    if ($resultAnswer) {
        if ($roundGame == 3) {
            finishGame($name);
            exit();
        }
        startEvenGame($name, $roundGame + 1);
    } else {
        startEvenGame($name, 1);
    }
}

function startGCDGame($name, $roundGame = 0)
{
    if (!$roundGame) {
        line('Find the greatest common divisor of given numbers.');
        $roundGame = 1;
    }

    $randomNumber1 = rand(1, 100);
    $randomNumber2 = rand(1, 100);
    $question = "{$randomNumber1} {$randomNumber2}";
    $correctAnswer = gcd($randomNumber1, $randomNumber2);

    $resultAnswer = checkAnswer($question, $correctAnswer, $name);
    if ($resultAnswer) {
        if ($roundGame == 3) {
            finishGame($name);
            exit();
        }
        startGCDGame($name, $roundGame + 1);
    } else {
        startGCDGame($name, 1);
    }
}

function startProgressionGame($name, $roundGame = 0)
{
    if (!$roundGame) {
        line('What number is missing in the progression?');
        $roundGame = 1;
    }

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

    $resultAnswer = checkAnswer($question, $correctAnswer, $name);
    if ($resultAnswer) {
        if ($roundGame == 3) {
            finishGame($name);
            exit();
        }
        startProgressionGame($name, $roundGame + 1);
    } else {
        startProgressionGame($name, 1);
    }
}

function startPrimeGame($name, $roundGame = 0)
{
    if (!$roundGame) {
        line('Answer "yes" if given number is prime. Otherwise answer "no".');
        $roundGame = 1;
    }

    $number = rand(1, 100);

    $checkPrimeNumber = function ($num) {
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

    $question = $number;
    $correctAnswer = $checkPrimeNumber($number) ? 'yes' : 'no';

    $resultAnswer = checkAnswer($question, $correctAnswer, $name);
    if ($resultAnswer) {
        if ($roundGame == 3) {
            finishGame($name);
            exit();
        }
        startPrimeGame($name, $roundGame + 1);
    } else {
        startPrimeGame($name, 1);
    }
}
