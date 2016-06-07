<!DOCTYPE html>
<html>
    <head>
        <title>NotesIframe</title>
        <link rel="stylesheet" type="text/css" href="../styles.css">
        <link rel="stylesheet" type="text/css" href="../events.css">
    </head>
    <body>

                <?php if($notes == null) : ?>
                <p>It doesn't look like you have any notes, why don't you add one?</p>
                <form action="notescontrol.php" method="post">
                <fieldset class="iframebutton">
                    <label>&nbsp;</label>
                    <input type="submit" name="button" value="add new note" class="iframebutton">
                </fieldset>
                </form>
                <?php else : ?>
                <form action="notescontrol.php" method="post">
                <fieldset class="iframebutton">
                    <label>&nbsp;</label>
                    <input type="submit" name="button" value="add new note" class="iframebutton">
                </fieldset>
                </form>
                <table class="iframetable">
                    <tr class="iframetable">
                        <th class="title">Title</th>
                        <th class="note">Note</th>
                        <th class="date">Date</th>
                        <th class="iframetablebutton">&nbsp;</th>
                        <th class="iframetablebutton">&nbsp;</th>
                    </tr>
                    <?php foreach ($notes as $note) : ?>
                    <tr class="iframetable">
                        <td><?php echo $note['title'];?></td>
                        <td><?php echo $note['note'];?></td>
                        <td><?php echo $note['date'];?></td>
                        <td><form action="<?php echo "notescontrol.php?id=$eventId"; ?>" method='post'>
                        <input type='hidden' name='eventId' value='<?php echo $eventId; ?>'>
                        <input type="hidden" name="title" value="<?php echo $note['title'];?>">
                        <input type="hidden" name="note" value="<?php echo $note['note'];?>">
                        <input type="hidden" name="date" value="<?php echo $note['date'];?>">
                        <input type='hidden' name='noteId' value='<?php echo $note['id'];?>'>
                        <input type='submit' name='button' value='edit note' class="iframetablebutton">
                    </form></td>
                        <td><form action="<?php echo "notescontrol.php?id=$eventId"; ?>" method='post'>
                        <input type="hidden" name="eventId" value="<?php echo $eventId; ?>">
                        <input type='hidden' name='noteId' value='<?php echo $note['id'];?>'>
                        <input type='submit' name='button' value='delete' class="iframetablebutton">
                    </form></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
    </body>
</html>