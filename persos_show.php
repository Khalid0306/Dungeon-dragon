<?php require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_GET['id'])) {
        header('Location: persos.php?msg=id non passé !');
    }

    $bdd = connect();

    $sql="SELECT * FROM persos WHERE id = :id AND user_id=:user_id;";

    $sth = $bdd->prepare($sql);

    $sth->execute([
        'id'        => $_GET['id'],
        'user_id'   => $_SESSION['user']['id']
    ]);

    $perso = $sth->fetch();
?>
<?php require_once('_header.php'); ?>
<div class="container">
<h1>Détail du personnage</h1>
    
<div class="mt-2" >
     <b>Nom:</b> <?php echo $perso['name']; ?>
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

    <div class="mt-2">
        <b>Point de vie:</b> <?php echo $perso['pv']; ?>
    </div>

 <div>
    <a href="persos.php" class="btn btn-red">Retour</a>
 </div>
</div>
 
 


