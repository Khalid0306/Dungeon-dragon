<?php require_once('functions.php');
    require_once('_increase_stats.php');
    

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }
    $bdd = connect();
    
    $sql = "SELECT * FROM persos WHERE id = :id AND user_id = :user_id ";

    $sth = $bdd->prepare($sql);

    $sth->execute([
        'id'        => $_GET['id'],
        'user_id'   => $_SESSION['user']['id']
    ]);

    $perso = $sth->fetch();
?>


<?php require_once('_header.php'); ?>
<div class="container">
    <form action="" method="POST">
        <div class="">
        <?php require_once('_perso_show_image.php'); ?>
        </div>
        <h1>Placez vos points de competence dans les stats de votre choix :</h1>
        <div class="mt-2">
            <b>Points de competence:</b> <?php echo $perso['pts de competence']; ?>
        </div>
        <div class="mt-2">
            <b>Point de vie:</b> <?php echo $perso['pv']; ?>
        </div>
        <form action="_increase_stat.php" method="POST">
        <div class="mt-2">
        <input type="hidden" name="stat" value="pv">
        <input type="submit" value="+">
        </div>
        </form>
        
        <form action="_increase_stat.php" method="POST">
            <input type="hidden" name="stat" value="pwr">
            <input type="submit" value="+">
        </form>

        <div class="mt-2">
            <b>Force:</b> <?php echo $perso['pwr']; ?>
        </div>
        <div class="mt-2">
        <a href="persos.php" class="btn btn-red">+</a>
        </div>

        <div class="mt-2">
            <b>Dextérité:</b> <?php echo $perso['dex']; ?>
        </div>
        <div class="mt-2">
        <a href="persos.php" class="btn btn-red">+</a>
        </div>

        <div class="mt-2">
            <b>Defense :</b> <?php echo $perso['def']; ?>
        </div>
        <div class="mt-2">
        <a href="persos.php" class="btn btn-red">+</a>
        </div>

        <div class="mt-2">
            <b>Mana:</b> <?php echo $perso['mana']; ?>
        </div>
        <div class="mt-2">
        <a href="persos.php" class="btn btn-red">+</a>
        </div>

        <div class="mt-2">
            <b>Vitesse:</b> <?php echo $perso['vit']; ?>
        </div>
        <div class="mt-2">
        <a href="persos.php" class="btn btn-red">+</a>
        </div>

        <div class="mt-2">
            <a href="persos.php" class="btn btn-red">Retour</a>
        </div>
        </div>

    </form>