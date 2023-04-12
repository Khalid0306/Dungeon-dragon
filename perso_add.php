<?php require_once('functions.php'); ?>

    <?php
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (isset($_POST["send"])) {
        if ($_POST['name'] != "") {
            $bdd = connect();

            $sql = "INSERT INTO persos (`name`, `pwr`, `vit`, `pv`, `def`, `mana`, `dex`, `aff`, `user_id`) VALUES (:name, :pwr, :vit, :pv, :def, :mana, :dex, :aff, :user_id);";
            echo $sql;
            $sth = $bdd->prepare($sql);
            $sth->execute([
                'name'      => $_POST['name'],
                'pwr'       => 8,
                'vit'       => 12,
                'pv'        => 30,
                'def'       => 12,
                'mana'      => 6,
                'dex'       => 11,
                'aff'       => $_POST['aff'],
                'user_id'   =>$_SESSION ['user']['id']
        ]);

        header('Location: persos.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        <center><b>Creez votre personnage</b></center>
    </h1>
    <form action="" method="POST">
    <div>
        <label for="name">name :</label>
        <input type="name" placeholder="Entrez le nom de votre personnage" name="name" id="name" />
    </div>
    <div>
        <label for="aff">affinite :</label>
        <input type="aff" placeholder="Entrez votre affinité" name="aff" id="aff" />
    </div>
    <div>
        <input type="submit" class="btn btn-green" name="send" value="Créer" />
    </div>
    </form>
    

</body>

</html>