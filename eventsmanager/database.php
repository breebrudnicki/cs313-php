<?php
try {
    $user = 'eventsManager';
    $password = 'azsxdc!@#';
    $db = new PDO('mysql:host=localhost;dbname=events', $user, $password);
} catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
}