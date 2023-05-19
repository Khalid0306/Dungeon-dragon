<ul id="nav">
    <?php if (!isset($_SESSION['user'])) { ?>
        <li><a href="register.php">Sign in</a></li>
        <li><a href="login.php">Log in</a></li>
    <?php } else { ?>
        <li><a href="page_acceuil.php">Home</a></li>
        <li><a href="persos.php">Bastion</a></li>
        <li><a href="player_show.php">My account</a></li>
        <li><a href="logout.php">Logout</a></li>
    <?php } ?>
</ul>