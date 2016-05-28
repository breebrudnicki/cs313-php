<?php

$page = "eventsManager";
session_start();
require_once 'model/sql.php';

if (filter_input(INPUT_GET, 'button')) {
    $button = filter_input(INPUT_GET, 'button');
} else {
    $button = filter_input(INPUT_POST, 'button');
}

if (isset($_SESSION['loggedin'])) {
    $userId = $_SESSION['userId'];
    $events = displayEvents($userId);
    include 'views/events.php';
} else {
    switch ($button) {
        case 'login':
            //capture and validate data
            $email = htmlspecialchars(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
            $password = htmlspecialchars(filter_input(INPUT_POST, 'password'));
            if ($email == false) {
                $loginmessage = "Please enter a valid email address";
                include 'views/login.php';
                exit;
            }
            //query the database based off the email entered
            $user = login($email);
            $hashedpassword = $user['password'];
            if (password_verify($password, $user['password'])) {
                //the passwords match, do the login
                $_SESSION['loggedin'] = true;
                $_SESSION['userId'] = $user['id'];
                $_SESSION['firstName'] = $user['firstName'];
                $userId = $_SESSION['userId'];
                $events = displayEvents($userId);
                include 'views/events.php';
            } else {
                //the password does not match, login failed
                $loginmessage = 'Please check your credentials and try again';
                include 'views/login.php';
                exit;
            }
            break;
        case 'create new account':
            //capture and validate data
            $email = htmlspecialchars(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
            $password = htmlspecialchars(filter_input(INPUT_POST, 'password'));
            $firstName = htmlspecialchars(filter_input(INPUT_POST, 'firstName'));
            $lastName = htmlspecialchars(filter_input(INPUT_POST, 'lastName'));
            //password pattern
            $pw_pattern = '/^(?=.*[[:digit:]])(?=.*[[:upper:]])(?=.*[[:punct:]])[[:print:]]{5,17}$/';
            //find out if this user already exists
            $user = login($email);
            if ($user) {
                $createmessage = "A user with that email already exists ";
                include 'views/login.php';
                exit;
            }
            if ($email == false) {
                $createmessage = "Please enter a valid email address";
                include 'views/login.php';
                exit;
            } elseif (empty($password) || empty($firstName) || empty($lastName)) {
                $createmessage = "All fields are required, please don't leave anything blank.";
                include 'views/login.php';
                exit;
            } elseif ($email.length > 100) {
                $createmessage = "Email cannot be greater than 100 characters";
                include 'views/login.php';
                exit;
            } elseif (preg_match($pw_pattern, $password)) { //use pregmatch
                $createmessage = "Password must be between 8 and 20 characters, include one capital letter, one number, and one special character.";
                include 'views/login.php';
                exit;
            } elseif ($firstName.length > 35) {
                $createmessage = "Name cannot be greater than 35 characters";
                include 'views/login.php';
                exit;
            } elseif ($lastName.length > 35) {
                $createmessage = "Name cannot be greater than 35 characters";
                include 'views/login.php';
                exit;
            }  else {
                //create the user and send to events page
                $hashedpassword = password_hash($password, PASSWORD_DEFAULT); //hashed password
                $result = registerUser($firstName, $lastName, $email, $hashedpassword);
                if ($result) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['firstName'] = $user['firstName'];
                    $userId = $_SESSION['userId'];
                    $events = displayEvents($userId);
                    include 'views/events.php';
                } else {
                    $createmessage = "We're sorry, $firstName , but there was an error creating your account.";
                }
            }
            break;
        default:
            include 'views/login.php';
    }
}