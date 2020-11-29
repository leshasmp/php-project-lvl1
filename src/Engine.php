<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function checkValue($answer, $correctAnswer): bool
{
    if ($answer == $correctAnswer) {
        return true;
    }
    return false;
}

function checkAnswer($question, $correctAnswer, string $name): bool
{
    line('Question: ' . $question);
    $answer = prompt('Your answer');
    $result = checkValue($answer, $correctAnswer);
    if ($result) {
        line('Correct!');
        return true;
    } else {
        line("'%s!' is wrong answer ;(. Correct answer was '$correctAnswer'.", $answer);
        line("Let's try again, $name");
        return false;
    }
}

function startGame(string $questionText, callable $condition)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($questionText);

    $roundGame = 1;

    while ($roundGame <= 3) {
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
