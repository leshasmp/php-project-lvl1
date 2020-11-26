<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function askName()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function checkValue($answer, $correctAnswer)
{
    if ($answer == $correctAnswer) {
        return true;
    }
    return false;
}

function finishGame($name)
{
    line("Congratulations, $name!");
}

function checkAnswer($question, $correctAnswer, $name)
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

function gcd($a, $b)
{
    while ($a != $b) {
        if ($a > $b) {
            $a = $a - $b;
        } else {
            $b = $b - $a;
        }
    }
    return $a;
}
