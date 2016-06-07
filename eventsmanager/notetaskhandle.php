<?php
session_start();
require_once 'model/sql.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 if (filter_input(INPUT_POST, 'button')) {
     $button = filter_input(INPUT_POST, 'button');
 }
 
 switch ($button) {
     case "add note":
         //grab eventId
         $eventId = htmlspecialchars(filter_input(INPUT_POST, 'eventId'));
         //grab other information from the form
         $title = htmlspecialchars(filter_input(INPUT_POST, 'title'));
         $note = htmlspecialchars(filter_input(INPUT_POST, 'note'));
         $date = htmlspecialchars(filter_input(INPUT_POST, 'date'));
         //add the new note
         add_notes($eventId, $title, $note, $date);
         //redirect to the notes control page
         header("Location: notescontrol.php?id=$eventId");
         break;
     case "update":
         //grab event id
         $eventId = htmlspecialchars(filter_input(INPUT_POST, 'eventId'));
         //grab other information from the form (in this case you will need the noteId!!)
         $title = htmlspecialchars(filter_input(INPUT_POST, 'title'));
         $note = htmlspecialchars(filter_input(INPUT_POST, 'note'));
         $date = htmlspecialchars(filter_input(INPUT_POST, 'date'));
         $noteId = htmlspecialchars(filter_input(INPUT_POST, 'noteId'));
         //update note
         update_notes($title, $note, $date, $noteId);
         //redirect to control page
         header("Location: notescontrol.php?id=$eventId");
         break;
     case "add task":
         //grab eventId and other information
         $eventId = htmlspecialchars(filter_input(INPUT_POST, 'eventId'));
         $date = htmlspecialchars(filter_input(INPUT_POST, 'date'));
         $description = htmlspecialchars(filter_input(INPUT_POST, 'description'));
         $task = htmlspecialchars(filter_input(INPUT_POST, 'task'));
         //add task
         add_tasks($eventId, $task, $description, $date);
         //redirect to the task control page
         header("Location: taskscontrol.php?id=$eventId");
         break;
     case "update task":
         //grab all necessary information
         $eventId = htmlspecialchars(filter_input(INPUT_POST, 'eventId'));
         $date = htmlspecialchars(filter_input(INPUT_POST, 'date'));
         $description = htmlspecialchars(filter_input(INPUT_POST, 'description'));
         $task = htmlspecialchars(filter_input(INPUT_POST, 'task'));
         $taskId = htmlspecialchars(filter_input(INPUT_POST, 'taskId'));
         //update task
         update_tasks($task, $description, $date, $taskId);
         //redirect to the task control page
         header("Location: taskscontrol.php?id=$eventId");
         break;
         break;
     default :
         break;
 }

