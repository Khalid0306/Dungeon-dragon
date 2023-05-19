
<?php require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_GET['id'])) {
        header('Location: persos.php?msg=id not passed !');
    }

    $bdd = connect();

    if (isset($_POST["send"])) {
        if ($_POST['name'] != "") {

            $sql="UPDATE persos SET name = :name WHERE id = :id AND user_id = :user_id;";

            $sth = $bdd->prepare($sql);

            

            $sth->execute([
                'id'        => $_GET['id'],
                'user_id'   => $_SESSION['user']['id'],
                'name'      => $_POST['name']

            ]);

            /*$perso = $sth->fetch();*/
        }
    }
?>
<?php require_once('_header.php'); ?>
<div class="container">
<h1>Modification : </h1>
<form action="" method="POST">
    <div>
        <!-- <b>Nom actuelle : </b><?php echo $perso['name'];?>-->
        <label for="name">name :</label>
        <input type="name" placeholder="Enter your character's name" name="name" id="name" />
    </div>
    <div>
        <input type="submit" class="btn btn-grey" name="send" value="Edit" />
    </div>
    </form>
<div>
    <a href="persos.php" class="btn btn-red">Return</a>
 </div>
</div>

