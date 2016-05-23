<?php
session_start();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Login to Events Manager</title>
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
            <h2>Hi, Welcome to your events manager!</h2>
            <p>For class purposes the email is "cs313@byui.edu" and the password is "Password1!", but feel free to make your own account. :)</p>
            <div>
                <h3>Sign into an existing account.</h3>
                <?php
                if(isset($loginmessage)) {
                   echo "<p class='error'> $loginmessage </p>";
                    }
                ?>
                    <form action="index.php" method="post">
                        <fieldset>
                            <label for="email">Email</label>
                            <br>
                            <input type="email" name="email" id="email" required placeholder="email@domain.com">
                            <br>
                            <label>Password</label>
                            <br>
                            <input type="password" name="password" id="password" required>
                            <br>
                            <br>

                            <label>&nbsp;</label>
                            <input class="button" type="submit" name="button" value="login">
                        </fieldset>
                    </form>
            </div>
            <div>
                <h3>Create a new account.</h3>
                <?php if(isset($createmessage)) {
                   echo "<p class='error'> $createmessage </p>";
                    }
                ?>
                    <form action="index.php" method="post">
                        <fieldset>
                            <label for='firstName'>First Name</label>
                            <br>
                            <input type='text' name='firstName' id='firstName' required value="<?php echo $firstName?>">
                            <br>
                            <label for='lastName'>Last Name</label>
                            <br>
                            <input type='text' name='lastName' id='lastName' required value="<?php echo $lastName?>">
                            <br>
                            <label for="email">Email</label>
                            <br>
                            <input type="email" name="email" id="email" required placeholder="email@domain.com" value="<?php echo $email?>">
                            <br>
                            <label>Create a Password</label>
                            <br>
                            <input type="password" name="password" id="password" required>
                            <br>
                            <br>

                            <label>&nbsp;</label>
                            <input class="button" type="submit" name="button" value="create new account">
                        </fieldset>
                    </form>
            </div>
        </main>
        <?php include "../modules/footer.html"; ?>
    </body>

    </html>