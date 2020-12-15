<?php

declare(strict_types=1);

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function startGame(string $description, callable $condition): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);

    for ($roundGame = 1; $roundGame <= ROUNDS_COUNT; $roundGame++) {
        $conditions = $condition();
        $correctAnswer = $conditions['correctAnswer'];
        $question = $conditions['question'];

        line("Question: $question");
        $answer = prompt('Your answer');

        if ($answer == $conditions['correctAnswer']) {
            line('Correct!');
        } else {
            line("'%s!' is wrong answer ;(. Correct answer was '$correctAnswer'.", $answer);
            line("Let's try again, $name");
            return;
        }
    }

    line("Congratulations, $name!");
}
