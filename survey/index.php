<?php 
$page = "assignments";
//$lifetime = 60 * 60 * 24 * 14; // 2 weeks in seconds
//$session_set_cookie_params($lifetime, '/');
session_start();
?>
    <!doctype html>
    <html>

    <head>
        <title>Survey</title>
        <link rel="stylesheet" type="text/css" href="../styles.css">
        <link rel="stylesheet" type="text/css" href="surveycss.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
    </head>

    <body>
        <header>
            <a href="."><img src="../images/headerimg.png" alt="Bree Carrick"></a>
            <?php include "../modules/nav.php"?>
        </header>
        <main>
            <?php //begin if took quiz
            if (isset($_SESSION['tookQuiz']) && $_SESSION['tookQuiz'] == true) { ?>
                <h3>It looks like you've already taken the quiz, why don't you view the results?</h3>
                <a href='results.php' class='button'>View Results</a>
                <?php  //else did not take quiz
            } else { ?>
                    <h2>How much do you love food?</h2>
                    <a href="results.php">View other peoples results.</a>
                    <img src="surveyphotos/lovefood.jpg" alt="I love food" class='surveyimg'>
                    <form method="post" action="handlesubmit.php">
                        <p class='quiz'>Please enter your name:</p>
                        <input type='text' name='name' size='30' required>
                        <br>
                        <br>
                        <p class='quiz'>1. What cheers you up when you're feeling sad?
                            <p>
                                <img src='surveyphotos/happiness.jpg' alt='mcdonalds brings joy'>
                                <br>
                                <label>
                                    <input type='radio' name='happiness' value='5' required>Food</label>
                                <br>
                                <label>
                                    <input type='radio' name='happiness' value='1'>Exercise</label>
                                <br>
                                <label>
                                    <input type='radio' name='happiness' value='3' class='last'>Spending time with friends</label>
                                <br>
                                <p class='quiz'>2. If you were trying to lose weight what would you do?</p>
                                <img src='surveyphotos/nodiet.gif' alt='serious suggestions only'>
                                <br>
                                <label>
                                    <input type='radio' name='weight' value='5' required>Pray</label>
                                <br>
                                <label>
                                    <input type='radio' name='weight' value='3'>Exercise More</label>
                                <br>
                                <label>
                                    <input type='radio' name='weight' value='1' class='last'>Go on a diet</label>
                                <br>
                                <p class='quiz'>3. Who do you relate to in this photo?</p>
                                <img src='surveyphotos/potatochip.jpg' alt='finely tunes chip vs. potato chip'>
                                <br>
                                <label>
                                    <input type='radio' name='chip' value='5' required>Ann Perkins</label>
                                <br>
                                <label>
                                    <input type='radio' name='chip' value="1">Chris Traeger</label>
                                <br>
                                <label>
                                    <input type='radio' name='chip' value='3' class='last'>Neither</label>
                                <br>
                                <p class='quiz'>4. If somebody says they're not a dessert person, how do you react?</p>
                                <img src='surveyphotos/dessert.jpg' alt="I'm not really a dessert person">
                                <br>
                                <label>
                                    <input type='radio' name='dessert' value='5' required>This person is absurd!</label>
                                <br>
                                <label>
                                    <input type='radio' name='dessert' value='3'>This person is a little odd.</label>
                                <br>
                                <label>
                                    <input type='radio' name='dessert' value='1' class='last'>To each their own.</label>
                                <br>
                                <p class='quiz'>5. How often do you go out to eat?</p>
                                <img src='surveyphotos/takeout.jpg' alt='takeout'>
                                <br>
                                <label>
                                    <input type='radio' name='takeout' value='5' required>Way too often</label>
                                <br>
                                <label>
                                    <input type='radio' name='takeout' value='3'>Sometimes</label>
                                <br>
                                <label>
                                    <input type='radio' name='takeout' value='1' class='last'>Never</label>
                                <br>

                                <input type='submit' value='See Results' class='survey'>
                    </form>
                    <?php  // end if else statement about if they took the quiz
            } ?>
        </main>
        <?php include "../modules/footer.html"; ?>
    </body>

    </html>