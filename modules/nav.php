<nav>
            <ul>
                <li><a 
                    <?php if ($page=="home") {
                    echo 'class="active"';
                }
?> href="/index.php">Home</a></li>
                <li><a 
                        <?php if ($page=="about") {
                    echo 'class="active"';
                } ?> href="/about.php">About Me</a></li>
                <li><a 
                        <?php if ($page=="assignments") {
                    echo 'class="active"';
                }?> href="/assignments.php">Assignments</a></li>
            </ul>
        </nav>