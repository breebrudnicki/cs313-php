<?php
$page = "assignments";
//$lifetime = 60 * 60 * 24 * 14; // 2 weeks in seconds
//$session_set_cookie_params($lifetime, '/');
session_start();
//open the file for reading
$file = fopen('results.csv', 'rb');
$results = array();
while (!feof($file)) { // a loop that goes through the end of the file
    $result = fgetcsv($file);
    $results[] = $result;
}
//now results carries an array of arrays from the csv file. Now you can work with it! :)
?>
    <?php
//work through each question to work with results in answer form
foreach ($results as $r) :
    ?>
        <?php
    //5th index - final results
    if ($r[5] >= 20) {
        if (!isset($finres3)) {
            $finres3 = 1;
        } else {
            $finres3++;
        }
    } else if ($r[5] >= 11) {
        if (!isset($finres2)) {
            $finres2 = 1;
        } else {
            $finres2++;
        }
    } else {
        if (!isset($finres1)) {
            $finres1 = 1;
        } else {
            $finres1++;
        }
    }
    ?>
            <?php
    //questions 1-5 indexes 0-4
    for ($i = 0; $i < 5; $i++) {
        if ($r[$i] == 5) {
            if (!isset(${"q" . $i . "res3"})) {
                ${"q" . $i . "res3"} = 1;
            } else {
                ${"q" . $i . "res3"} ++;
            }
        } else if ($r[$i] == 3) {
            if (!isset(${"q" . $i . "res2"})) {
                ${"q" . $i . "res2"} = 1;
            } else {
                ${"q" . $i . "res2"} ++;
            }
        } else {
            if (!isset(${"q" . $i . "res1"})) {
                ${"q" . $i . "res1"} = 1;
            } else {
                ${"q" . $i . "res1"} ++;
            }
        }
    }
    ?>
                <?php
    //6th index - name
    if ($r[6] == $_SESSION['name']) {
        $user_result = $r[5];
    }
    ?>
                    <?php endforeach; ?>
                        <?php
//find div width for final
$totalfin = $finres1 + $finres2 + $finres3;
for ($i = 1; $i < 4; $i++) {
    ${"f" . $i . "div"} = ${"finres" . $i} / $totalfin * 300; //width
    ${"f" . $i . "per"} = ${"finres" . $i} / $totalfin * 100; //percent
}
//find div width for individual questions
//loop through all 5 questions (0-4)
for ($i = 0; $i < 5; $i++) {
    ${"totalq" . $i} = ${"q" . $i . "res1"} + ${"q" . $i . "res2"} + ${"q" . $i . "res3"};
    for ($j = 1; $j < 4; $j++) {
        ${"q" . $i . "_" . $j . "div"} = ${"finres" . $j} / $totalfin * 300; //width
        ${"q" . $i . "_" . $j . "per"} = ${"finres" . $j} / $totalfin * 100; //percent
    }
}
?>
                            <!DOCTYPE html>
                            <html>

                            <head>
                                <title>Results</title>
                                <link rel="stylesheet" type="text/css" href="../styles.css">
                                <link rel="stylesheet" type="text/css" href="surveycss.css">

                            </head>

                            <body>
                                <header>
                                    <a href="."><img src="../images/headerimg.png" alt="Bree Carrick"></a>
                                    <?php include "../modules/nav.php" ?>
                                </header>
                                <main>
                                    <!--Display the users results from just taking the quiz..
                You will need an if statement in case they are just looking
                at the results and did not take the quiz... sessions?...
                else a button for them to take the quiz-->
                                    <?php
                //begin if took quiz
                if (isset($_SESSION['tookQuiz']) && $_SESSION['tookQuiz'] == true) {
                    $_SESSION['name'] = $name
                    ?>
                                        <h3><?php echo $name; ?>, here are your results!</h3>

                                        <?php
                    if ($r[5] >= 20) {
                        echo "<h4>You sure do love food!</h4> <img src='surveyphotos/aboveaverage.jpg' alt='above average'>";
                    } else if ($r[5] >= 11) {
                        echo "<h4>You're the average food lover.</h4> <img src='surveyphotos/average.jpg' alt='average'>";
                    } else {
                        echo "Everyone loves food, you're just healthy!</h4> <img src='surveyphotos/healthy.jpg' alt='healthy'>";
                    }
                    ?>

                                            <?php //else did not take quiz
} else {
    ?>
                                                <h3 class='top'>It doesn't look like you've taken the quiz, why don't you do that?</h3>
                                                <a href='index.php' class='button'>Take Quiz</a>
                                                <?php // end if else statement about if they took the quiz
}
?>

                                                    <!--Display the results of everyone who has ever taken the quiz..
                Just the final result/answer-->
                                                    <h3>Overall Results</h3>
                                                    <p class='results'>You sure do love food!</p>
                                                    <div class='results' style='width:<?php echo "$f3div" ?>px;'>
                                                        <?php echo $f3per; ?>%</div>
                                                    <br>
                                                    <p class='results'>You're the average food lover.</p>
                                                    <div class='results' style='width:<?php echo "$f2div" ?>px;'>
                                                        <?php echo $f2per; ?>%</div>
                                                    <br>
                                                    <p class='results'> Everyone loves food, you're just also healthy!</p>
                                                    <div class='results' style='width:<?php echo "$f1div" ?>px;'>
                                                        <?php echo $f1per; ?>%</div>
                                                    <!--Display the results for questions 1-5 here.-->
                                                    <h3>Individual Question Results</h3>

                                                    <h4>Question 1: What cheers you up when you're feeling sad?</h4>
                                                    <p class='results'>Food</p>
                                                    <div class='results' style='width:<?php echo "$q0_3div" ?>px;'>
                                                        <?php echo $q0_3per; ?>%</div>
                                                    <br>
                                                    <p class='results'>Exercise</p>
                                                    <div class='results' style='width:<?php echo "$q0_1div" ?>px;'>
                                                        <?php echo $q0_1per; ?>%</div>
                                                    <br>
                                                    <p class='results'>Spending time with friends.</p>
                                                    <div class='results' style='width:<?php echo "$q0_2div" ?>px;'>
                                                        <?php echo $q0_2per; ?>%</div>
                                                    <br>

                                                    <h4>Question 2: If you were trying to lose weight what would you do?</h4>
                                                    <p class='results'>Pray</p>
                                                    <div class='results' style='width:<?php echo "$q1_3div" ?>px;'>
                                                        <?php echo $q1_3per; ?>%</div>
                                                    <br>
                                                    <p class='results'>Exercise more</p>
                                                    <div class='results' style='width:<?php echo "$q1_2div" ?>px;'>
                                                        <?php echo $q1_2per; ?>%</div>
                                                    <br>
                                                    <p class='results'>Go on a diet</p>
                                                    <div class='results' style='width:<?php echo "$q1_1div" ?>px;'>
                                                        <?php echo $q1_1per; ?>%</div>
                                                    <br>

                                                    <h4>Question 3: Who do you relate to in this photo?</h4>
                                                    <p class='results'>Ann Perkins</p>
                                                    <div class='results' style='width:<?php echo "$q2_3div" ?>px;'>
                                                        <?php echo $q2_3per; ?>%</div>
                                                    <br>
                                                    <p class='results'>Chris Traeger</p>
                                                    <div class='results' style='width:<?php echo "$q2_1div" ?>px;'>
                                                        <?php echo $q2_1per; ?>%</div>
                                                    <br>
                                                    <p class='results'>Neither</p>
                                                    <div class='results' style='width:<?php echo "$q2_2div" ?>px;'>
                                                        <?php echo $q2_2per; ?>%</div>
                                                    <br>

                                                    <h4>Question 4: If somebody says they're not a dessert person, how do you react?</h4>
                                                    <p class='results'>This person is absurd!</p>
                                                    <div class='results' style='width:<?php echo "$q3_3div" ?>px;'>
                                                        <?php echo $q3_3per; ?>%</div>
                                                    <br>
                                                    <p class='results'>This person is a little odd.</p>
                                                    <div class='results' style='width:<?php echo "$q3_2div" ?>px;'>
                                                        <?php echo $q3_2per; ?>%</div>
                                                    <br>
                                                    <p class='results'>To each their own.</p>
                                                    <div class='results' style='width:<?php echo "$q3_1div" ?>px;'>
                                                        <?php echo $q3_1per; ?>%</div>
                                                    <br>

                                                    <h4>Question 5: How often do you go out to eat?</h4>
                                                    <p class='results'>Way too often.</p>
                                                    <div class='results' style='width:<?php echo "$q4_3div" ?>px;'>
                                                        <?php echo $q4_3per; ?>%</div>
                                                    <br>
                                                    <p class='results'>Sometimes</p>
                                                    <div class='results' style='width:<?php echo "$q4_2div" ?>px;'>
                                                        <?php echo $q4_2per; ?>%</div>
                                                    <br>
                                                    <p class='results'>Never</p>
                                                    <div class='results' style='width:<?php echo "$q4_1div" ?>px;'>
                                                        <?php echo $q4_1per; ?>%</div>
                                                    <br>
                                </main>
                                <?php include "../modules/footer.html"; ?>
                            </body>

                            </html>