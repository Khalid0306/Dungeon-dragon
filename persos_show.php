<?php require_once('functions.php');


    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_GET['id'])) {
        header('Location: persos.php?msg=id non passé !');
    }

    $bdd = connect();
    

    // Récupérer les classes
    $sql = "SELECT * FROM classes";
    $sth = $bdd->prepare($sql);
    $sth->execute();
    $classes = $sth->fetchAll();

    // Récupérer les races
    $sql = "SELECT * FROM races";
    $sth = $bdd->prepare($sql);
    $sth->execute();
    $races = $sth->fetchAll();


    $sql = "SELECT persos.*, classes.nom_classe AS class_name, races.nom_race AS race_name 
    FROM persos 
    INNER JOIN classes ON persos.id_classes = classes.id_classes 
    INNER JOIN races ON persos.id_race = races.id_race 
    WHERE persos.id = :id AND persos.user_id = :user_id LIMIT 0, 25";

    $sth = $bdd->prepare($sql);

    $sth->execute([
        'id'        => $_GET['id'],
        'user_id'   => $_SESSION['user']['id']
    ]);

    $perso = $sth->fetch();
?>
<?php require_once('_header.php'); ?>
<div class="container">
<div class="">
     <!-- <?php //require_once('_perso_show_image.php'); ?> -->
    </div>
<h1>Détail du personnage</h1>
<div class="mt-2" >
     <b>Nom:</b> <?php echo $perso['name']; ?>
     </div>
     
     <div class="mt-2">
        <b>Point de vie:</b> <?php echo $perso['pv']; ?>
    </div>

    <div class="mt-2">
        <b>Class :</b> <?php echo $perso['class_name']; ?>
    </div>

    <div class="mt-2">
        <b>Race :</b> <?php echo $perso['race_name']; ?>
    </div>
    
    <div class="mt-2">
        <b>Level :</b> <?php echo $perso['level']; ?>
    </div>

    <div class="mt-2">
        <b>Xp :</b> <?php echo $perso['xp']; ?>
    </div>

    <div class="mt-2">
        <b>Point de compétence :</b> <?php echo $perso['pts de competence']; ?>
    </div>

<div class="mt-2" >
     <b>Affinité:</b> <?php echo $perso['aff']; ?>
     </div>

<div class="mt-2">
        <b>Gold:</b> <?php echo $perso['gold']; ?>
    </div>

 <div class="mt-2">
        <b>Force:</b> <?php echo $perso['pwr']; ?>
    </div>

    <div class="mt-2">
        <b>Dextérité:</b> <?php echo $perso['dex']; ?>
    </div>

    <div class="mt-2">
        <b>Defense :</b> <?php echo $perso['def']; ?>
    </div>

    <div class="mt-2">
        <b>Mana:</b> <?php echo $perso['mana']; ?>
    </div>

    <div class="mt-2">
        <b>Vitesse:</b> <?php echo $perso['vit']; ?>
    </div>

    <div class="vl"></div>

    <div class="vl_text">
    
    <h1>Attribuez vos points CP: </h1>

        <div class="mt-4">
            <b>Point de compétence :</b> <?php echo $perso['pts de competence']; ?>
        </div>

        <div class="mt-4">
            <b>Point de vie:</b> <?php echo $perso['pv']; ?>
            <div >
                <form action="_increase_stats.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $perso['id']; ?>">
                    <input type="hidden" name="stat" value="pv">
                    <input type="submit" value="+" class="btn btn-green" onClick="return confirm('Confirmez vous votre choix ?')">
                </form>
            </div>
        </div>

        <div class="mt-2">
            <b>Force:</b> <?php echo $perso['pwr']; ?>
            <div >
                <form action="_increase_stats.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $perso['id']; ?>">
                    <input type="hidden" name="stat" value="pwr">
                    <input type="submit" value="+" class="btn btn-green" onClick="return confirm('Confirmez vous votre choix ?')">
                </form>
            </div>
        </div>

        <div class="mt-2">
            <b>Dextérité:</b> <?php echo $perso['dex']; ?>
            <div >
                <form action="_increase_stats.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $perso['id']; ?>">
                    <input type="hidden" name="stat" value="dex">
                    <input type="submit" value="+" class="btn btn-green" onClick="return confirm('Confirmez vous votre choix ?')">
                </form>
            </div>
        </div>

        <div class="mt-2">
            <b>Defense :</b> <?php echo $perso['def']; ?>
            <div >
                <form action="_increase_stats.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $perso['id']; ?>">
                    <input type="hidden" name="stat" value="def">
                    <input type="submit" value="+" class="btn btn-green" onClick="return confirm('Confirmez vous votre choix ?')">
                </form>
            </div>
        </div>

        <div class="mt-2">
            <b>Mana:</b> <?php echo $perso['mana']; ?>
            <div >
                <form action="_increase_stats.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $perso['id']; ?>">
                    <input type="hidden" name="stat" value="mana">
                    <input type="submit" value="+" class="btn btn-green" onClick="return confirm('Confirmez vous votre choix ?')">
                </form>
            </div>
        </div>

        <div class="mt-2">
            <b>Vitesse:</b> <?php echo $perso['vit']; ?>
            <div >
                <form action="_increase_stats.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $perso['id']; ?>">
                    <input type="hidden" name="stat" value="vit">
                    <input type="submit" value="+" class="btn btn-green"  onClick="return confirm('Confirmez vous votre choix ?')">
                </form>
            </div>
        </div>
    
    </div> 

 <div class="mt-2">
    <a href="persos.php" class="btn btn-red">Retour</a>
 </div>
</div>

 
 


