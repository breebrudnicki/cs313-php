<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once 'model/sql.php';

if (filter_input(INPUT_GET, 'button')) {
    $button = filter_input(INPUT_GET, 'button');
} elseif (filter_input(INPUT_POST, 'button')){
    $button = filter_input(INPUT_POST, 'button');
} else {
    $button = "";
}

switch ($button) {
    case "add new task":
        $action = "add";
        $eventId = $_SESSION['eventId'];
        include "views/addedittask.php";
        break;
    case "delete":
        $noteId = filter_input(INPUT_POST, 'noteId');
        delete_note($noteId);
        //get info to redisplay new page
        if (filter_input(INPUT_GET, 'id')) {
            $eventId = htmlspecialchars(filter_input(INPUT_GET, 'id'));
        } elseif (filter_input(INPUT_GET, 'eventId')) {
            $eventId = htmlspecialchars(filter_input(INPUT_GET, 'eventId'));
        }
        $notes = getNotes($eventId);
        $_SESSION['eventId'] = $eventId;
        include "views/tasksIframe.php";
        break;
    case "edit task":
        $action = "edit";
        $eventId = $_SESSION['eventId'];
        $task = htmlspecialchars(filter_input(INPUT_POST, 'task'));;
        $description = htmlspecialchars(filter_input(INPUT_POST, 'description'));;
        $date = htmlspecialchars(filter_input(INPUT_POST, 'date'));;
        $taskId = htmlspecialchars(filter_input(INPUT_POST, 'taskId'));;
        include "views/addedittask.php";
        break;
    default:
        $eventId = htmlspecialchars(filter_input(INPUT_GET, 'id'));
        $tasks = getTasks($eventId);
        $_SESSION['eventId'] = $eventId;
        include "views/tasksIframe.php";
        break;
}