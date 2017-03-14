<?php

if ($argc == 3 && (is_numeric($argv[1]) && is_numeric($argv[2]))) {
	$min = $argv[1];
	$max = $argv[2];
	do {
		if ($min > $max) {
			fwrite(STDOUT, "Oops! Your min number was larger than your max number. Please try again: " . PHP_EOL);
			do {
				fwrite(STDOUT, "Please choose a min number: ");
				$min = trim(fgets(STDIN));
			} while (!is_numeric($min));
			do {
				fwrite(STDOUT, "Please choose a max number: ");
				$max = trim(fgets(STDIN));
			} while (!is_numeric($max));
		}
	} while ($min > $max);
} elseif ($argc == 3 && (is_numeric($argv[1]) || is_numeric($argv[2]))) {	
	fwrite(STDOUT, "Error: At least one of your inputs is not a numeric value" . PHP_EOL);	
	do {
		fwrite(STDOUT, "Please choose a min number: ");
		$min = trim(fgets(STDIN));
	} while (!is_numeric($min));
	do {
		fwrite(STDOUT, "Please choose a max number: ");
		$max = trim(fgets(STDIN));
	} while (!is_numeric($max));
	do {
		if ($min > $max) {
			fwrite(STDOUT, "Oops! Your min number was larger than your max number. Please try again: " . PHP_EOL);
			do {
				fwrite(STDOUT, "Please choose a min number: ");
				$min = trim(fgets(STDIN));
			} while (!is_numeric($min));
			do {
				fwrite(STDOUT, "Please choose a max number: ");
				$max = trim(fgets(STDIN));
			} while (!is_numeric($max));
		}
	} while ($min > $max);
} else {
	$min = 1;
	$max = 100;
}

$randomNumber = mt_rand($min, $max);
$numberOfGuesses = 0;

fwrite(STDOUT, "Guess a number between $min-$max: ");
$answer = trim(fgets(STDIN));

while ($randomNumber !== $answer) {
	if (!is_numeric($answer)) {
		$message = "Sorry, only numeric values are accepted. Please guess again: " . PHP_EOL;
		fwrite(STDOUT, $message);
		$answer = trim(fgets(STDIN));
	} elseif ($answer > $randomNumber) {
		$numberOfGuesses += 1;
		$message = "LOWER... Guess Again: ";
		fwrite(STDOUT, $message);
		$answer = trim(fgets(STDIN));
	} elseif ($answer < $randomNumber) {
		$numberOfGuesses += 1;
		$message = "HIGHER... Guess Again: ";
		fwrite(STDOUT, $message);
		$answer = trim(fgets(STDIN));
	} else {
		$numberOfGuesses += 1;
		$message = "GOOD GUESS! It only took you $numberOfGuesses guesses!" . PHP_EOL;
		fwrite(STDOUT, $message);
		break;
	}
}



// function checkMinMax() {
// 	do {
// 		if ($min > $max) {
// 			fwrite(STDOUT, "Oops! Your min number was larger than your max number. Please try again: " . PHP_EOL);
// 			do {
// 				fwrite(STDOUT, "Please choose a min number: ");
// 				$min = trim(fgets(STDIN));
// 			} while (!is_numeric($min));
// 			do {
// 				fwrite(STDOUT, "Please choose a max number: ");
// 				$max = trim(fgets(STDIN));
// 			} while (!is_numeric($max));
// 		}
// 	} while ($min > $max);
// }