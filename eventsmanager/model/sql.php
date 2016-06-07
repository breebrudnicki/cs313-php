<?php
require_once 'model/database.php';
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

//function to add an event
function addEvent($eventName, $description, $date, $userId) {
        global $db;
    $query = "INSERT INTO events
          (eventName, description, date, userId)
          VALUES
          (:eventName, :description, :date, :userId)";
    $statement = $db->prepare($query);
    $statement->bindValue(':eventName', $eventName);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':userId', $userId);
    $statement->execute();
    //$result = $statement->rowCount();
    $insertId = $db->lastInsertId();
    $statement->closeCursor();
    return $insertId;
}

//function to delete an event
function delete_event($eventId) {
    global $db;
    $query = 'DELETE FROM events
              WHERE id = :eventId';
    $statement = $db->prepare($query);
    $statement->bindValue(':eventId', $eventId);
    $statement->execute();
    $statement->closeCursor();
}

// add tasks
function add_tasks($eventId, $task, $description, $date) {
    global $db;
    $query = "INSERT INTO tasks
          (eventId, task, description, completed, date)
          VALUES
          (:eventId, :task, :description, :completed, :date)";
    $statement = $db->prepare($query);
    $statement->bindValue(':eventId', $eventId);
    $statement->bindValue(':task', $task);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':completed', '0');
    $statement->bindValue(':date', $date);
    $statement->execute();
    //$result = $statement->rowCount(); 
    $insertId = $db->lastInsertId();
    $statement->closeCursor();
    return $insertId;
}
//delete tasks
function delete_task($taskId) {
    global $db;
    $query = 'DELETE FROM tasks
              WHERE id = :taskId';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskId', $taskId);
    $statement->execute();
    $statement->closeCursor();
}
//add notes
function add_notes($eventId, $title, $note, $date) {
    global $db;
    $query = "INSERT INTO notes
          (eventId, title, note, date)
          VALUES
          (:eventId, :title, :note, :date)";
    $statement = $db->prepare($query);
    $statement->bindValue(':eventId', $eventId);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':note', $note);
    $statement->bindValue(':date', $date);
    $statement->execute();
    //$result = $statement->rowCount(); 
    $insertId = $db->lastInsertId();
    $statement->closeCursor();
    return $insertId;
}
//delete notes
function delete_note($noteId) {
    global $db;
    $query = 'DELETE FROM notes
              WHERE id = :noteId';
    $statement = $db->prepare($query);
    $statement->bindValue(':noteId', $noteId);
    $statement->execute();
    $statement->closeCursor();
}
//update events
function update_events($eventName, $description, $date, $eventId) {
    global $db;
    $query = "UPDATE events
              SET
                eventName = :eventName,
                description = :description,
                date = :date
              WHERE
                id = :eventId";
    $statement = $db->prepare($query);
    $statement->bindValue(':eventName', $eventName);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':eventId', $eventId);
    $statement->execute();
    $statement->closeCursor();
}
//update notes
function update_notes($title, $note, $date, $noteId) {
    global $db;
    $query = "UPDATE notes
              SET
                title = :title,
                note = :note,
                date = :date
              WHERE
                id = :noteId";
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':note', $note);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':noteId', $noteId);
    $statement->execute();
    $statement->closeCursor();
}
//update tasks
function update_tasks($task, $description, $date, $taskId) {
    global $db;
    $query = "UPDATE tasks
              SET
                task = :task,
                description = :description,
                date = :date
              WHERE
                id = :taskId";
    $statement = $db->prepare($query);
    $statement->bindValue(':task', $task);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':taskId', $taskId);
    $statement->execute();
    $statement->closeCursor();
}
//mark task as completed
function complete_task($completed, $taskId) {
    global $db;
    $query = "UPDATE tasks
              SET
                completed = :completed
              WHERE
                id = :taskId";
    $statement = $db->prepare($query);
    $statement->bindValue(':completed', $completed);
    $statement->bindValue(':taskId', $taskId);
    $statement->execute();
    $statement->closeCursor();
}

//delete tasks with eventId
function delete_notefromevent($eventId) {
    global $db;
    $query = 'DELETE FROM notes
              WHERE eventId = :eventId';
    $statement = $db->prepare($query);
    $statement->bindValue(':eventId', $eventId);
    $statement->execute();
    $statement->closeCursor();
}
//delete notes with eventId
function delete_taskfromevent($eventId) {
    global $db;
    $query = 'DELETE FROM tasks
              WHERE eventId = :eventId';
    $statement = $db->prepare($query);
    $statement->bindValue(':eventId', $eventId);
    $statement->execute();
    $statement->closeCursor();
}