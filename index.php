<?php 
// start session
session_start();
// include the quiz app
include 'inc/quiz.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
        <?php
        // if cuurent question less than 10, view the code below.
         if ($_SESSION['questionsAnswered'] <= $questionsTotal): 
         ?>
            <div class="toast"><?php echo $message; ?></div>
            <p class="breadcrumbs"><?php echo "Question " . $_SESSION['questionsAnswered'] . " of " . $questionsTotal; ?></p>
            <p class="quiz"> <?php echo "What is " . $adders["left"] . " + " . $adders["right"] . " ? </br>"; ?> </p>
        <?php endif; ?>

            <form action="" method="post">
            <?php 
                // creating random number and store it in session to track post and prevent post on refresh
                $rand=rand();
                $_SESSION['rand'] = $rand;
                // if cuurent question less than 10, generate a new question
                if ($_SESSION['questionsAnswered'] <= $questionsTotal) {
                    echo '<input type="hidden" value="' . $rand . '" name="randcheck" />';
                    echo ' <input type="hidden" name="l-add"  value="' . $adders["left"] . '" >';
                    echo ' <input type="hidden" name="r-add"  value="' . $adders["right"] . '" >';
                    foreach ($answers as $key => $answer) {
                        echo '<input type="submit" class="btn" name="answer" value="' . $answer .  '" /> ';
                    }
                    // else show score and end test, and offer to retake test
                    } else {
                        echo '<div class="score">';
                        echo '<svg viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 9h-2V5h2v6zm0 4h-2v-2h2v2z"/></svg>';
                        echo '<p class="finale"> You Scored ' . $_SESSION['totalCorrect'] . ' Correct Answers out of 10 Questions!</p>';
                        echo '</div>';
                        echo "</br>";
                        echo '<input type="submit" class="btn restart-btn" name="restart" value="⟲ Retake Quiz">';
                    }
        
            ?>
            </form>
        </div>
    </div>
</body>
</html>