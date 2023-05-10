<?php require_once('functions.php'); ?>

<?php 
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }
    $bdd= connect();

    $sql= "SELECT * FROM persos WHERE user_id = :user_id ";

    $sth= $bdd->prepare($sql);
    
    $sth->execute([
        'user_id'        =>$_SESSION['user']['id']
    ]);

    $persos = $sth ->fetchAll();

    //dd($persos);
?>

<?php require_once('_header.php'); ?>
    <h1><?php echo $_SESSION['user']['email']; ?></h1>
    <div class="container">
    <h2><a>Vos personnages :</a></h2>
    
    <?php if (isset($_GET['msg'])) {
        echo "<div>" . $_GET['msg']. "</div>";
    } ?>

    <table class="table">
        <thead>
            <tr>
            <th width="1%">ID</th>
                <th>Nom</th>
                <th>Xp</th>
                <th>PV</th>
                <th>Force</th>
                <th>Dextérité</th>
                <th>Defence</th>
                <th>Mana</th>
                <th>Affinité</th>
                <th>Vitesse</th>
                <th>Or</th>
                <th width="30%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($persos as $perso) { ?>
                <tr>
                    <td><?php echo $perso['id']; ?></td>
                    <td><?php echo $perso['name']; ?></td>
                    <td><?php echo $perso['xp']; ?></td>
                    <td><?php echo $perso['pv']; ?></td>
                    <td><?php echo $perso['pwr']; ?></td>
                    <td><?php echo $perso['dex']; ?></td>
                    <td><?php echo $perso['def']; ?></td>
                    <td><?php echo $perso['mana']; ?></td>
                    <td><?php echo $perso['aff']; ?></td>
                    <td><?php echo $perso['vit']; ?></td>
                    <td><?php echo $perso['gold']; ?></td>
                    <td align="right">
                        <?php if ($perso['pv'] > 0) { ?>
                            <a 
                                class="btn btn-green"
                                href="persos_choice.php?id=<?php echo $perso['id']; ?>" 
                            >Choisir</a>
                        <?php } else { ?>
                            <a 
                                class="btn btn-green"
                                href="persos_respawn.php?id=<?php echo $perso['id']; ?>" 
                            >Résussité</a>
                        <?php } ?>

                    <a href="persos_show.php?id=<?php echo $perso['id']; ?>" class="btn btn-grey"
                           >Détail</a>
                        <a href="modif_persos.php? id=<?php echo $perso['id'];?>" class="btn btn-blue"
                           >Modifier</a>
                        <a  href="persos_del.php?id=<?php echo $perso['id'];?> " class="btn btn-red"
                           onClick="return confirm('Voulez-vous vraiment le supprimer ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="mt-4">
    <a href="perso_add.php" class="btn btn-blue"> Creer votre personnage</a>
    </div>
    </div>
</body>
</html>

