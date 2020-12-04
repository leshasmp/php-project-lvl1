<?php

declare(strict_types=1);

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function checkAnswer($question, $correctAnswer, string $name): bool
{
    line('Question: ' . $question);
    $answer = prompt('Your answer');

    $result = $answer == $correctAnswer;

    if ($result) {
        line('Correct!');
    } else {
        line("'%s!' is wrong answer ;(. Correct answer was '$correctAnswer'.", $answer);
        line("Let's try again, $name");
    }

    return $result;
}

function startGame(string $questionText, callable $condition): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($questionText);

    $roundGame = 1;
    $maxQuantityGames = 3;
    while ($roundGame <= $maxQuantityGames) {
        $conditions = $condition();
        $resultAnswer = checkAnswer($conditions['question'], $conditions['correctAnswer'], $name);

        if ($resultAnswer) {
            $roundGame++;
        } else {
            $roundGame = 1;
        }
    }

    line("Congratulations, $name!");
}
