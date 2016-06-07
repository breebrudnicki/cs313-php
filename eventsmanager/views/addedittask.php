<!DOCTYPE html>
<html>
    <head>
        <title>Task</title>
    </head>
    <body>
            <h1><?php if (($action == "add")) {
                echo "Add New";
            } else {
                echo "Edit";
            }?> Task</h1>
            <?php
            if (isset($error)) {
                echo "<p class='error'> $error </p>";
            }
            ?>
            <form action="notetaskhandle.php" method="post">
                <fieldset>
                    <label for="task">Task</label> <br>
                    <input type="text" name="task" id="title" size="100" required <?php
                    if (isset($task)) {
                        echo "value='$task'";
                    }
                    ?>> <br>
                    <label for="description">Description</label> <br>
                    <textarea type="text" name="description" id="note" cols="100" rows="10" required><?php
                    if (isset($description)) {
                        echo $description;
                    }
                    ?></textarea><br>
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" required <?php
                    if (isset($date)) {
                        echo "value='$date'";
                    }
                    ?>>
                    <input type="hidden" name="eventId" value="<?php echo $eventId;?>">
                    <label>&nbsp;</label>
                    <?php if ($action == "add") : ?>
                    <input type="submit" name="button" value="add task">
                    <?php elseif ($action == "edit") : ?>
                    <input type="hidden" name="taskId" value="<?php echo $taskId; ?>">
                    <input type="submit" name="button" value="update task">
                    <?php endif; ?>
                </fieldset>
            </form>
    </body>
</html>

