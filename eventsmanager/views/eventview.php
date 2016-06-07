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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
        <a href="."><img src="../images/headerimg.png" alt="Bree Carrick"></a>
        <?php include "../modules/nav.php"?>
        </header>
        <main>
            <h2><?php echo $eventName; ?></h2>
            <p><?php echo $description; ?></p>
            <h2><?php echo $daysleft; ?></h2>
            <p>Days until your event!</p>
            <div class='notes'>
                <h3>Notes about <?php echo $eventName; ?></h3>
                <iframe width="100%" height="300px" src="<?php echo $notesrc;?>" name="notes_iframe"></iframe>
            </div>
            <div class='notes'>
                <h3>Tasks for <?php echo $eventName; ?></h3>
                <iframe width="100%" height="300px" src="<?php echo $tasksrc;?>" name="tasks_iframe"></iframe>
            </div>
        </main>
        <?php include "../modules/footer.html"; ?>
    </body>
</html>
