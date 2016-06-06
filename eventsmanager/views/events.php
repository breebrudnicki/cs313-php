<?php
session_start();
//if user is not logged in
if (!isset($_SESSION['loggedin'])) {
    //redirect to the login page
    header('Location: index.php');
}
//grab their name from the session
$name = $_SESSION['firstName'];
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            <?php echo $name?>'s Events Manager</title>
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
            <h2>Hi, <?php echo $name;?>! Welcome to your events manager.</h2>
            <?php if ($events == null) : ?>
                <p>It doesn't look like you have any events, why don't you create one?</p>
                <form action="index.php" method="get">
                    <fieldset>
                        <label>&nbsp;</label>
                        <input type="submit" name="button" value="create event">
                    </fieldset>
                </form>
                <?php else : ?>
                    <form action="index.php" method="get">
                        <fieldset>
                            <label>&nbsp;</label>
                            <input type="submit" name="button" value="create event">
                        </fieldset>
                    </form>
                    <table>
                        <tr>
                            <th>Event</th>
                            <th>Date</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                        <?php foreach ($events as $event) : ?>
                            <tr>
                                <td>
                                    <?php echo $event['eventName']; ?>
                                </td>
                                <td>
                                    <?php echo $event['date']; ?>
                                </td>
                                <td>
                                    <form action='eventhandle.php?id=<?php echo $event[' id '];?>' method='get'>
                                        <input type='hidden' name='eventId' value='<?php echo $event[' id '];?>'>
                                        <input type='submit' name='<?php echo $event[' id '];?>' value='edit note'>
                                    </form>
                                </td>
                                <td>
                                    <form action='index.php' method='post'>
                                        <input type='hidden' name='eventId' value='<?php echo $event[' id '];?>'>
                                        <input type='submit' name='button' value='delete'>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </table>
                    <?php endif;?>
        </main>
        <?php include "../modules/footer.html"; ?>
    </body>

    </html>