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

    $persos = $sth ->fetchAll()

    //dd($persos);
?>

<?php require_once('_header.php'); ?>
    <h1><?php echo $_SESSION['user']['email']; ?></h1>
    <h2><a>Vos personnages :</a></h2>
    
    <?php if (isset($_GET['msg'])) {
        echo "<div>" . $_GET['msg']. "</div>";
    } ?>

    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nom</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($persos as $perso) { ?>
                <tr>
                    <td><?php echo $perso['id']; ?></td>
                    <td><?php echo $perso['name']; ?></td>
                    <td>
                    <a href="persos_show.php?id=<?php echo $perso['id']; ?>" class="btn btn-grey"
                           >Détail</a>
                        <a  href="persos_del.php?id=<?php echo $perso['id'];?> " class="btn btn-green"
                           onClick="return confirm('Voulez-vous vraiment le supprimer ?')">Supprimer</a>
                           <a href="modif_persos.php? id=<?php echo $perso['id'];?>" class="btn btn-blue"
                           >Modifier</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="perso_add.php" class="btn btn-blue"> Creer votre personnage</a>
</body>
</html>

