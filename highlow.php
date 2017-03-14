<?php

$randomNumber = mt_rand(1, 100);
$numberOfGuesses = 0;

fwrite(STDOUT, "Guess a number between 1-100:" . PHP_EOL);
$answer = fgets(STDIN);

while ($randomNumber !== $answer) {
	if ($answer > $randomNumber) {
		echo "LOWER..." . PHP_EOL;
		$numberOfGuesses += 1;
		fwrite(STDOUT, "Guess Again:" . PHP_EOL);
		$answer = fgets(STDIN);
	} elseif ($answer < $randomNumber) {
		echo "HIGHER..." . PHP_EOL;
		$numberOfGuesses += 1;
		fwrite(STDOUT, "Guess Again:" . PHP_EOL);
		$answer = fgets(STDIN);
	} else {
		echo "GOOD GUESS!" . PHP_EOL;
		$numberOfGuesses += 1;
		echo "It only took you $numberOfGuesses guesses!" . PHP_EOL;
		break;
	}
}