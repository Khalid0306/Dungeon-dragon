<ul id="nav">
    <?php if (!isset($_SESSION['user'])) { ?>
        <li><a href="register.php">Créer un compte</a></li>
        <li><a href="login.php">Connexion</a></li>
    <?php } else { ?>
        <li><a href="page_acceuil.php">Acceuil</a></li>
        <li><a href="persos.php">Bastion</a></li>
        <li><a href="player_show.php">Mon compte</a></li>
        <li><a href="logout.php">Logout</a></li>
    <?php } ?>
</ul>