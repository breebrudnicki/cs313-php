<!DOCTYPE html>
<html>
    <head>
        <title>Tasks Iframe</title>
    </head>
    <body>
        <?php if($tasks == null && $completedtasks == null) : ?>
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
                        <th>&nbsp;</th>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>&nbsp;</th>
                    </tr>
                <form>
                    <?php foreach ($tasks as $task) : ?>
                    <tr>
                        <td>
                            <form action="taskscontrol.php" method="post">
                                <fieldset>
                                    <input type="hidden" name="taskId" value="<?php echo $task['id']; ?>">
                                <label>&nbsp;</label>
                                <input type="submit" name="button" value="<?php echo '  ';?>">
                                </fieldset>
                            </form></td>
                        <td><?php echo $task['task']; ?></td>
                        <td><?php echo $task['description'];?></td>
                        <td><?php echo $task['date']; ?></td>
                        <td><form action="<?php echo "taskscontrol.php?id=$eventId"; ?>" method='post'>
                        <input type='hidden' name='eventId' value='<?php echo $eventId; ?>'>
                        <input type="hidden" name="task" value="<?php echo $task['task'];?>">
                        <input type="hidden" name="description" value="<?php echo $task['description'];?>">
                        <input type="hidden" name="date" value="<?php echo $task['date'];?>">
                        <input type='hidden' name='taskId' value='<?php echo $task['id'];?>'>
                        <input type='submit' name='button' value='edit task'>
                    </form></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php foreach ($completedtasks as $complete) : ?>
                    <tr>
                        <td>
                            <form action="taskscontrol.php" method="post">
                                <fieldset>
                                    <input type="hidden" name="taskId" value="<?php echo $complete['id']; ?>">
                                <label>&nbsp;</label>
                                <input type="submit" name="incomplete" value="<?php echo '&#10003;';?>">
                                </fieldset>
                            </form></td>
                            <td><?php echo $complete['task']; ?></td>
                        <td><?php echo $complete['description'];?></td>
                        <td><?php echo $complete['date']; ?></td>
                        <td><form action="<?php echo "taskscontrol.php?id=$eventId"; ?>" method='post'>
                        <input type='hidden' name='eventId' value='<?php echo $eventId; ?>'>
                        <input type="hidden" name="task" value="<?php echo $complete['task'];?>">
                        <input type="hidden" name="description" value="<?php echo $complete['description'];?>">
                        <input type="hidden" name="date" value="<?php echo $complete['date'];?>">
                        <input type='hidden' name='taskId' value='<?php echo $complete['id'];?>'>
                        <input type='submit' name='button' value='edit task'>
                    </form></td>
                    </tr>
                    <?php endforeach; ?>
                </form>
                </table>
                <?php endif; ?>
    </body>
</html>
