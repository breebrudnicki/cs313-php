<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    //redirect to the login page
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $eventName?></title>
        <link rel="stylesheet" type="text/css" href="../styles.css">
        <link rel="stylesheet" type="text/css" href="../events.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
        <a href="."><img src="../images/headerimg.png" alt="Bree Carrick"></a>
        <?php include "../modules/nav.php"?>
        </header>
        <main>
            <div class="countdown"> 
            <h2><?php echo $daysleft; ?></h2>
            <p>Days until <?php echo $eventName; ?>!</p>
            </div>
            <div class="description"><p><?php echo $description; ?></p>
            <form action="events.php" method="post">
                <fieldset class="iframebutton">
                    <input type='hidden' name='event' value='<?php echo $eventName;?>'>
                    <input type='hidden' name='description' value='<?php echo $description;?>'>
                    <input type='hidden' name='date' value='<?php echo $date;?>'>
                    <input type="hidden" name="eventId" value="<?php echo $eventId; ?>">
                    <input type="submit" name="button" value="edit this event">
                </fieldset>
            </form></div>
            <div>
                <h3>Notes for <?php echo $eventName; ?></h3>
                <iframe width="100%" height="300px" src="<?php echo $notesrc;?>" name="notes_iframe"></iframe>
            </div>
            <div>
                <h3>Tasks for <?php echo $eventName; ?></h3>
                <iframe width="100%" height="300px" src="<?php echo $tasksrc;?>" name="tasks_iframe"></iframe>
            </div>
        </main>
        <?php include "../modules/footer.html"; ?>
    </body>
</html>
