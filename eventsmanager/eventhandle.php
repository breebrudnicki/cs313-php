<?php
session_start();
require_once 'model/sql.php';
//grab the information from createevent page
if ((filter_input(INPUT_GET, 'new'))){
        $eventName = htmlspecialchars(filter_input(INPUT_GET, 'event'));
        $description = htmlspecialchars(filter_input(INPUT_GET, 'description'));
        $date = htmlspecialchars(filter_input(INPUT_GET, 'date'));
        $userId = $_SESSION['userId'];
        //query database to add the event and return event id
        $eventId = addEvent($eventName, $description, $date, $userId);
    
} else {
        $eventId = htmlspecialchars(filter_input(INPUT_GET, 'eventId'));
}
//$newEvent = htmlspecialchars(filter_input(INPUT_GET, 'new'));

//redirect to events.php
header("Location: events.php?eventId=$eventId");


