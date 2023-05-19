<?php

    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }

    $bdd = connect();

    $sql = "SELECT * FROM donjons";

    $sth = $bdd->prepare($sql);
        
    $sth->execute();

    $donjons = $sth->fetchAll();
?>

    <style>
    body {
        background-image: url(img/chateau-fantasmagorique-noir-dragon-volant-dans-canyon-montagnes-foret-illustration-dessin-anime-fantastique-palais-medieval-tours-bete-effrayante-ailes-rochers-pins_107791-4592.avif);
        background-size: cover;
    }
    </style>

<?php require_once('_header.php'); ?>
    <div class="container">
    <div 
        class="container"
        style="background-color: rgba(255,255,255, 0.2)"
    >
      <h3> <b><?php echo $_SESSION['perso']['name']; ?> (<a href="persos.php" class="btn btn-red">Change</a>)</b></h3>
        <ul>
            <?php foreach($donjons as $donjon) { ?>
                <li><a href="donjons_play.php?id=<?php echo $donjon['id']; ?>">
                    <?php echo $donjon['name'];?>
                </a></li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>