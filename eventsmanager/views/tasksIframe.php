<!DOCTYPE html>
<html>
    <head>
        <title>Tasks Iframe</title>
    </head>
    <body>
        <?php if($tasks == null) : ?>
                <p>It doesn't look like you have any tasks, why don't you add one?</p>
                <form action="taskscontrol.php" method="post">
                <fieldset>
                    <label>&nbsp;</label>
                    <input type="submit" name="button" value="add new task">
                </fieldset>
                </form>
                <?php else : ?>
                <form action="taskscontrol.php" method="post">
                <fieldset>
                    <label>&nbsp;</label>
                    <input type="submit" name="button" value="add new task">
                </fieldset>
                <table>
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                <form>
                    <?php foreach ($tasks as $task) : ?>
                    <tr>
                        <td><input type='checkbox' <?php if ($task['completed'] == 1) {echo 'checked';} ?> name='task' value='<?php echo $task['id']; ?>'><?php echo $task['task']; ?><br></td>
                        <td><?php echo $task['description'];?></td>
                        <td><?php echo $task['date']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </form>
                </table>
                <?php endif; ?>
    </body>
</html>
