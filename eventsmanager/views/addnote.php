<!DOCTYPE html>
<html>

<head>
    <title>Note</title>
</head>

<body>
    <h1><?php if (($action == "add")) {
                echo "Add New";
            } else {
                echo "Edit";
            }?> Note</h1>
    <?php
            if (isset($error)) {
                echo "<p class='error'> $error </p>";
            }
            ?>
        <form action="notetaskhandle.php" method="post">
            <fieldset>
                <label for="title">Title</label>
                <br>
                <input type="text" name="title" id="title" size="100" required <?php if (isset($title)) { echo "value='$title'"; } ?>>
                <br>
                <label for="note">Note</label>
                <br>
                <textarea type="text" name="note" id="note" cols="100" rows="10" required>
                    <?php
                    if (isset($note)) {
                        echo $note;
                    }
                    ?>
                </textarea>
                <br>
                <label for="date">Date</label>
                <input type="date" name="date" id="date" required <?php if (isset($date)) { echo "value='$date'"; } ?>>
                <input type="hidden" name="eventId" value="<?php echo $eventId;?>">
                <label>&nbsp;</label>
                <?php if ($action == "add") : ?>
                    <input type="submit" name="button" value="add note">
                    <?php elseif ($action == "edit") : ?>
                        <input type="hidden" name="noteId" value="<?php echo $noteId; ?>">
                        <input type="submit" name="button" value="update">
                        <?php endif; ?>
            </fieldset>
        </form>
</body>

</html>