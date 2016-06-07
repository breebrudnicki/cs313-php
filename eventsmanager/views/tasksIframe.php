<!DOCTYPE html>
<html>
    <head>
        <title>Tasks Iframe</title>
        <link rel="stylesheet" type="text/css" href="../styles.css">
        <link rel="stylesheet" type="text/css" href="../events.css">
    </head>
    <body>
        <?php if($tasks == null && $completedtasks == null) : ?>
                <p>It doesn't look like you have any tasks, why don't you add one?</p>
                <form action="taskscontrol.php" method="post">
                <fieldset class="iframebutton">
                    <label>&nbsp;</label>
                    <input type="submit" name="button" value="add new task" class="iframebutton">
                </fieldset>
                </form>
                <?php else : ?>
                <form action="taskscontrol.php" method="post">
                <fieldset class="iframebutton">
                    <label>&nbsp;</label>
                    <input type="submit" name="button" value="add new task" class="iframebutton">
                </fieldset>
                <table class="iframetable">
                    <tr class="iframetable">
                        <th class="check">&nbsp;</th>
                        <th class="task">Task</th>
                        <th class="description">Description</th>
                        <th class="date">Date</th>
                        <th class="iframetablebutton">&nbsp;</th>
                    </tr>
                <form>
                    <?php foreach ($tasks as $task) : ?>
                    <tr class="iframetable">
                        <td>
                            <form action="taskscontrol.php" method="post">
                                <fieldset class="iframebutton check">
                                    <input type="hidden" name="taskId" value="<?php echo $task['id']; ?>">
                                <input type="submit" name="button" value="<?php echo '  ';?>" class="iframetablebutton check">
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
                        <input type='submit' name='button' value='edit task' class="iframetablebutton">
                    </form></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php foreach ($completedtasks as $complete) : ?>
                    <tr class="iframetable">
                        <td>
                            <form action="taskscontrol.php" method="post">
                                <fieldset class="iframebutton check">
                                    <input type="hidden" name="taskId" value="<?php echo $complete['id']; ?>">
                                <input type="submit" name="incomplete" value="<?php echo '&#10003;';?>" class="iframetablebutton check">
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
                        <input type='submit' name='button' value='edit task' class="iframetablebutton">
                    </form></td>
                    </tr>
                    <?php endforeach; ?>
                </form>
                </table>
                <?php endif; ?>
    </body>
</html>
