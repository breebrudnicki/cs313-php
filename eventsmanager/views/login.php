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
            <h2>Hi there, Welcome to Events Manager!</h2>
            <p>For class purposes the email is "cs313@byui.edu" and the password is "Password1!", but feel free to make your own account. :)</p>
            <div class="col">
                
                    <form action="index.php" method="post" class="loginform">
              
                        <fieldset>
                            <h3 class="login">Login</h3>
                <?php
                if(isset($loginmessage)) {
                   echo "<p class='error'> $loginmessage </p>";
                    }
                ?>
                            <input type="email" name="email" id="email" required placeholder="email">
                            <br>
                            <input type="password" name="password" id="password" required placeholder="password">
                            <br>
                            <br>

                            <label>&nbsp;</label>
                            <input type="submit" name="button" value="login">
                        </fieldset>
                    </form>
            </div>
            <div class="col">
                    <form action="index.php" method="post">
                        <fieldset>
                            <h3 class="login">Create an Account</h3>
                <?php if(isset($createmessage)) {
                   echo "<p class='error'> $createmessage </p>";
                    }
                ?>
                            <input type='text' name='firstName' id='firstName' required placeholder="First Name" value="<?php if (isset($firstName)) {echo $firstName;}?>">
                            <br>
                            <input type='text' name='lastName' id='lastName' required placeholder="Last Name" value="<?php if (isset($lastName)) {echo $lastName;}?>">
                            <br>
                            <input type="email" name="email" id="email" required placeholder="email" value="<?php if (isset($email)) {echo $email;}?>">
                            <br>
                            <input type="password" name="password" placeholder=" create a password" id="password" required>
                            <br>
                            <br>

                            <label>&nbsp;</label>
                            <input type="submit" name="button" value="create new account">
                        </fieldset>
                    </form>
            </div>
        </main>
        <?php include "../modules/footer.html"; ?>
    </body>

    </html>