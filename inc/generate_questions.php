<?php
// variables and sessions variables
$questionsTotal = 10;
$message = "";
if(!isset($_SESSION['questionsAnswered'])) $_SESSION['questionsAnswered'] = 1;
if(!isset($_SESSION['totalCorrect'])) $_SESSION['totalCorrect'] = 0;

// array to auto generate and hold two random numbers to use in the test
$adders = [
    "left" => rand(1, 60),
    "right" => rand(1, 60),
];

// the correct answer
$correctAnswer = $adders["left"] + $adders["right"];

// two random decoy numbers in the same ballpark of the correct answer, abs() to prevent the number from being negative.
while( in_array( ($wrong1 = abs(mt_rand($correctAnswer - 5, $correctAnswer + 5))), array($correctAnswer, 0) ));
while( in_array( ($wrong2 = abs(mt_rand($correctAnswer - 5, $correctAnswer + 5))), array($correctAnswer, 0) ));


// make sure we don't get a duplicate answer as result of abs()
if ($wrong2 == $wrong1) {
    $wrong1 += 5 ;

    if ($wrong1 = $correctAnswer) {
        $wrong1 += 5 ;
    }
}

// array to store the numbers used in the quiz
$answers = [
    $correctAnswer,
    $wrong1,
    $wrong2,
];


// shuffling the numbers in the array $answers to randomize answer placements on the test form
shuffle($answers);
?>