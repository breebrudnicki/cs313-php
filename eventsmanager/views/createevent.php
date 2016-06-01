<?php
session_start();
//if user is not logged in
if (!isset($_SESSION['loggedin'])) {
    //redirect to the login page
    header('Location: index.php');
}
//grab their name from the session
$name = $_SESSION['firstName'];
$newEvent = "";
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            <?php echo $name;?>'s Events Manager</title>
        <link rel="stylesheet" type="text/css" href="../styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
    </head>

    <body>
        <header>
            <a href="."><img src="../images/headerimg.png" alt="Bree Carrick"></a>
            <?php include "../modules/nav.php";?>
        </header>
        <main>
            <h1>Add New Event</h1>
            <?php
            if (isset($error)) {
                echo "<p class='error'> $error </p>";
            }
            ?>
                <form action="events.php" method="get">
                    <fieldset>
                        <label for="event">Event</label>
                        <br>
                        <input type="text" name="event" id="event" size="100" required<?php if (isset($event)) { echo "value='$event'"; } ?>>
                        <br>
                        <label for="description">Description</label>
                        <br>
                        <textarea type="text" name="description" id="description" cols="100" rows="10" required>
                            <?php
                    if (isset($description)) {
                        echo $description;
                    }
                    ?>
                        </textarea>
                        <br>
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date">
                        <label>&nbsp;</label>
                        <input type="submit" name="button" value="create">
                    </fieldset>
                </form>
        </main>
        <?php include "../modules/footer.html"; ?>
    </body>

    </html>