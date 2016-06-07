<!DOCTYPE html>
<html>
    <head>
        <title>NotesIframe</title>
    </head>
    <body>

                <?php if($notes == null) : ?>
                <p>It doesn't look like you have any notes, why don't you add one?</p>
                <form action="notescontrol.php" method="post">
                <fieldset>
                    <label>&nbsp;</label>
                    <input type="submit" name="button" value="add new task">
                </fieldset>
                </form>
                <?php else : ?>
                <form action="notescontrol.php" method="post">
                <fieldset>
                    <label>&nbsp;</label>
                    <input type="submit" name="button" value="add new note">
                </fieldset>
                </form>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Note</th>
                        <th>Date</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php foreach ($notes as $note) : ?>
                    <tr>
                        <td><?php echo $note['title'];?></td>
                        <td><?php echo $note['note'];?></td>
                        <td><?php echo $note['date'];?></td>
                        <td><form action="<?php echo "notescontrol.php?id=$eventId"; ?>" method='post'>
                        <input type='hidden' name='eventId' value='<?php echo $eventId; ?>'>
                        <input type="hidden" name="title" value="<?php echo $note['title'];?>">
                        <input type="hidden" name="note" value="<?php echo $note['note'];?>">
                        <input type="hidden" name="date" value="<?php echo $note['date'];?>">
                        <input type='hidden' name='noteId' value='<?php echo $note['id'];?>'>
                        <input type='submit' name='button' value='edit note'>
                    </form></td>
                        <td><form action="<?php echo "notescontrol.php?id=$eventId"; ?>" method='post'>
                        <input type="hidden" name="eventId" value="<?php echo $eventId; ?>"
                        <input type='hidden' name='noteId' value='<?php echo $note['id'];?>'>
                        <input type='submit' name='button' value='delete'>
                    </form></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
    </body>
</html>