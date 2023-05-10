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

<?php require_once('_header.php'); ?>
<body>
    <h1>
        <center><b>Creez votre personnage</b></center>
    </h1>
    <form action="" method="POST">
    <div>
        <label for="name">Name :</label>
        <input type="name" placeholder="Entrez le nom de votre personnage" name="name" id="name" />
    </div>

    <div>
        <label for="aff">Affinite :</label>
        <select id="aff">
        <option value="">--Please choose an option--</option>
        <option value="Fire">Fire</option>
        <option value="Water">Water</option>
        <option value="Earth">Earth</option>
        <option value="Air">Air</option>
    </select>
    </div>
    <div>
    <label for="gender">Gender:</label>
        <select id="gender">
        <option value="">--Please choose an option--</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        </select>
    </div>
    <div>
        <input type="submit" class="btn btn-green" name="send" value="Créer" />
    </div>
    </form>
    

</body>

</html>