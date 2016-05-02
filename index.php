<?php
$page ="home";
?>
<!doctype html>
<html>

<head>
    <title> Home Page </title>
    <?php include "modules/links.html";?>
</head>

<body>
    <header>
        <a href="."><img src="images/headerimg.png" alt="Bree Carrick"></a>
        <?php include "modules/nav.php"; ?>
    </header>
    <main>
        <h2>Hi There!</h2>
        <p>This website has been created for Web Engineering 2 at BYU-Idaho. Thanks for stopping by! Content will be up soon. :)</p>
        <p><img class="signature" src="images/breesignature.png" alt="Bree Carrick"></p>
        <p class="stamp">Created by Bree Carrick April 28th 2016</p>
    </main>
    <?php include "modules/footer.html";?>
</body>

</html>