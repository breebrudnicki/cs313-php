<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$page = "eventsManager";
session_start();
require_once 'model/sql.php';
//events control page
if (!isset($_SESSION['loggedin'])) {
    //redirect to the login page
    header('Location: index.php');
} else {
    if (filter_input(INPUT_GET, 'button')) {
        $button = filter_input(INPUT_GET, 'button');
    } elseif (filter_input(INPUT_POST, 'button')){
        $button = filter_input(INPUT_POST, 'button');
    } else {
        $button = "";
    }
    switch ($button) {
        case "edit this event":
            //get $event, $description, $date, $eventId
            $event = htmlspecialchars(filter_input(INPUT_POST, 'event'));
            $description = htmlspecialchars(filter_input(INPUT_POST, 'description'));
            $date = htmlspecialchars(filter_input(INPUT_POST, 'date'));
            $eventId = htmlspecialchars(filter_input(INPUT_POST, 'eventId'));
            $action = "edit";
            include "views/createevent.php";
            break;
        default :
        $eventId = htmlspecialchars(filter_input(INPUT_GET, 'eventId'));
        //query to get all information about that specific event
        $event = getEvents($eventId);
        //create variables from returned event
        $eventName = $event['eventName'];
        $description = $event['description'];
        $date = $event['date'];
        $currentDate = getdate();
        $currentDate_f = $currentDate['year'] . "-" . $currentDate['mon'] . "-" . $currentDate['mday'];
        //logic to get days left
        $startTimeStamp = strtotime($currentDate_f);
        $endTimeStamp = strtotime($date);
        $timeDiff = abs($endTimeStamp - $startTimeStamp);
        $numberDays = $timeDiff / 86400;  // 86400 seconds in one day
        // and you might want to convert to integer
        $daysleft = intval($numberDays);
        //query tasks database
        $tasks = getTasks($eventId);
        //guery to get notes
        $notes = getNotes($eventId);
        //unset($_SESSION['eventId']);
        //iframe variable src
        $notesrc = "notescontrol.php?id=$eventId";
        $tasksrc = "taskscontrol.php?id=$eventId";
        include 'views/eventview.php';
        break;
}
}

