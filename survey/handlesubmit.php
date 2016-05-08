<?php
//$lifetime = 60 * 60 * 24 * 14; // 2 weeks in seconds
//$session_set_cookie_params($lifetime, '/');
session_start();
$_SESSION['tookQuiz'] = true;
//get all answers from the form and create variables via post
$happiness = htmlspecialchars(filter_input(INPUT_POST, 'happiness'));
$weight = htmlspecialchars(filter_input(INPUT_POST, 'weight'));
$chip = htmlspecialchars(filter_input(INPUT_POST, 'chip'));
$dessert = htmlspecialchars(filter_input(INPUT_POST, 'dessert'));
$takeout = htmlspecialchars(filter_input(INPUT_POST, 'takeout'));
$value = $happiness + $weight + $chip + $dessert + $takeout;
$name = htmlspecialchars(filter_input(INPUT_POST, 'name'));

$_SESSION['name'] = $name;

//put the variables in a format that can be saved to csv file
$line = "\n".$happiness.",".$weight.",".$chip.",".$dessert.",".$takeout.",".$value.",".$name;

// append this line to the file
file_put_contents("results.csv", $line, FILE_APPEND);
// redirect to the messages page
header('Location: results.php');