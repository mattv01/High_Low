<?php

if ($argc == 3) {
	$min = $argv[1];
	$max = $argv[2];
} else {	
	$min = 1;
	$max = 100;
}

$randomNumber = mt_rand($min, $max);
$numberOfGuesses = 0;

fwrite(STDOUT, "Guess a number between $min-$max: ");
$answer = fgets(STDIN);

while ($randomNumber !== $answer) {
	if ($answer > $randomNumber) {
		$numberOfGuesses += 1;
		$message = "LOWER... Guess Again: ";
		fwrite(STDOUT, $message);
		$answer = fgets(STDIN);
	} elseif ($answer < $randomNumber) {
		$numberOfGuesses += 1;
		$message = "HIGHER... Guess Again: ";
		fwrite(STDOUT, $message);
		$answer = fgets(STDIN);
	} else {
		$numberOfGuesses += 1;
		$message = "GOOD GUESS! It only took you $numberOfGuesses guesses!" . PHP_EOL;
		fwrite(STDOUT, $message);
		break;
	}
}