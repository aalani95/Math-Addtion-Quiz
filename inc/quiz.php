<?php

// include the questions generator file
include 'generate_questions.php';

// evaluate if the answer is correct when answering a question and outputing a toast
if(isset($_POST['answer']) && $_POST['randcheck'] == $_SESSION['rand']) {
    $_SESSION['questionsAnswered']++;
    if ($_POST["answer"] == ($_POST["l-add"] + $_POST["r-add"])) {
        $message = '<p class="message success"> 👌 That\'s Correct! Great Job.</p>';
        $_SESSION["totalCorrect"]++;
    } else {
        $message = '<p class="message error"> 👎 Bummer! Keep trying..</p>';
    }
}

// reset session variables when using opt-in to re-take test
if(isset($_POST['restart'])) {
    $_SESSION['questionsAnswered'] = 1;
    $_SESSION['totalCorrect'] = 0;
}

?>