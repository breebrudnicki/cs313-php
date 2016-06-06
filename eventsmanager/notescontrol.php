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
    case "add new note":
        $action = "add";
        $eventId = $_SESSION['eventId'];
        include "views/addnote.php";
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
        include "views/notesIframe.php";
        break;
    case "edit note":
        $action = "edit";
        $eventId = $_SESSION['eventId'];
        $title = htmlspecialchars(filter_input(INPUT_POST, 'title'));;
        $note = htmlspecialchars(filter_input(INPUT_POST, 'note'));;
        $date = htmlspecialchars(filter_input(INPUT_POST, 'date'));;
        $noteId = htmlspecialchars(filter_input(INPUT_POST, 'noteId'));;
        include "views/addnote.php";
        break;
    default:
        $eventId = htmlspecialchars(filter_input(INPUT_GET, 'id'));
        $notes = getNotes($eventId);
        $_SESSION['eventId'] = $eventId;
        include "views/notesIframe.php";
        break;
}