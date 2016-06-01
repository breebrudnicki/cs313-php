<?php
echo "logout page";
exit;
session_destroy();
header('Location: /eventsmanager/index.php');