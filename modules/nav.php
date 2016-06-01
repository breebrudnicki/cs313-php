<nav>
    <ul>
        <li><a <?php if ($page=="home" ) { echo 'class="active"'; } ?> href="/index.php">Home</a></li>
        <li><a <?php if ($page=="about" ) { echo 'class="active"'; } ?> href="/about.php">About Me</a></li>
        <li><a <?php if ($page=="assignments" ) { echo 'class="active"'; }?> href="/assignments.php">Assignments</a></li>
        <li><a <?php if ($page=="eventsManager" ) { echo 'class="active"'; }?> href="/eventsmanager/index.php">Events Manager</a></li>
        <?php
                if (!isset($_SESSION['loggedin'])) {
                    echo "<li class='right'><a href='/eventsmanager/index.php'>Login</a></li>";
                } else {
                    echo "<li class='right'><a href='/eventsmanager/model/logout.php'>Logout</a></li>";
                }
                ?>
    </ul>

</nav>