<?php
require_once 'database.php';
$db = loadDatabase(); 
//modular functions

//function to get user information for login
function login($email) {
    global $db;
    $query = 'SELECT * FROM users
               WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $password = $statement->fetch();
    $statement->closeCursor();
    return $password;
}

// function to create a new user
function registerUser($firstName, $lastName, $email, $hashedpassword) {
    global $db;
    $query = "INSERT INTO users
          (firstName, email, lastName, password)
          VALUES
          (:firstName, :email, :lastName, :password)";
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':password', $hashedpassword);
    $statement->execute();
    $result = $statement->rowCount();
    $statement->closeCursor();
    return $result;
}

//function to grab all of the events that they have
function displayEvents($userId) {
    global $db;
    $query = "SELECT * FROM events
             WHERE userId = :userId";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':userId', $userId);
    $stmt->execute();
    $events = $stmt->fetchAll();
    $stmt->closeCursor();
    return $events;
}

//function to grab things about event
function getEvents($eventId) {
    global $db;
    $query = "SELECT * FROM events
              WHERE id = :eventId";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':eventId', $eventId);
    $stmt->execute();
    $events = $stmt->fetch();
    $stmt->closeCursor();
    return $events;
}

//function to grab tasks
function getTasks($eventId) {
    global $db;
    $query = "SELECT * FROM tasks
              WHERE eventId = :eventId
              ORDER BY date ASC";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':eventId', $eventId);
    $stmt->execute();
    $tasks = $stmt->fetchAll();
    $stmt->closeCursor();
    return $tasks;
}

//function to grab noted
function getNotes($eventId) {
    global $db;
    $query = "SELECT * FROM notes
              WHERE eventId = :eventId
              ORDER BY date ASC";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':eventId', $eventId);
    $stmt->execute();
    $notes = $stmt->fetchAll();
    $stmt->closeCursor();
    return $notes;
}