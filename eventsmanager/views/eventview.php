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
        <title>
            <?php echo $eventName?>
        </title>
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
            <p>
                <?php echo $description; ?>
            </p>
            <h2><?php echo $daysleft; ?></h2>
            <p>Days until your event!</p>
            <div class='notes'>
                <h3>Notes about <?php echo $eventName; ?></h3>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Note</th>
                        <th>Date</th>
                    </tr>
                    <?php foreach ($notes as $note) : ?>
                        <tr>
                            <td>
                                <?php echo $note['title'];?>
                            </td>
                            <td>
                                <?php echo $note['note'];?>
                            </td>
                            <td>
                                <?php echo $note['date'];?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </table>
            </div>
            <div class='notes'>
                <h3>Tasks for <?php echo $eventName; ?></h3>
                <table>
                    <tr>
                        <th>Task</th>
                        <th>Date</th>
                    </tr>
                    <form>
                        <?php foreach ($tasks as $task) : ?>
                            <tr>
                                <td>
                                    <input type='checkbox' <?php if ($task[ 'completed']==1 ) {echo 'checked';} ?> name='task' value='
                                    <?php echo $task['id']; ?>'>
                                        <?php echo $task['task']; ?>
                                            <br>
                                </td>
                                <td>
                                    <?php echo $task['date']; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </form>
                </table>
            </div>
        </main>
        <?php include "../modules/footer.html"; ?>
    </body>

    </html>