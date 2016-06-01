<?php
session_start(); 
session_destroy();
header('Location: /eventsmanager/index.php');