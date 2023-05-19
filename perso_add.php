<?php require_once('functions.php'); ?>

<?php
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
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


if (isset($_POST["createNewPerso"])) {
    if ($_POST['name'] != "") {

        $perso = [
            'name'   => $_POST['name'],
            'pwr'    => 8,
            'vit'    => 12,
            'pv'     => 25,
            'def'    => 8,
            'mana'   => 6,
            'dex'    => 7,
            'aff'    => $_POST['aff'],
            'gender' => $_POST['gender'],
            'class'  => $_POST['class'],
            'race'   => $_POST['race'],
        ];

        // Bonus pour les classes ( 1 = Warrior, 3 = Healer, 4 = Archer, 5 = Tank, 6 = Thief,  7 = Mage) :
        if ($_POST['class'] == 1) {
            $perso['pwr'] += 7;
            $perso['mana'] += 5;
        }

        if ($_POST['class'] == 3) {
            $perso['pv'] += 10;
            $perso['mana'] += 6;
        }

        if ($_POST['class'] == 4) {
            $perso['pwr'] += 5;
            $perso['vit'] += 4;
        }

        if ($_POST['class'] == 5) {
            $perso['pv'] += 10;
            $perso['def'] += 5;
        }

        if ($_POST['class'] == 6) {
            $perso['dex'] += 5;
            $perso['vit'] += 7;
        }

        if ($_POST['class'] == 7) {
            $perso['mana'] += 7;
            $perso['pwr'] += 2;
        }

        // Bonus pour les races ( 1 = Elfe, 2 = Humain, 3 = Orc, 4 = Demon ) :
        if ($_POST['race'] == 1) {
            $perso['mana'] += 3;
        }

        if ($_POST['race'] == 2) {
            $perso['dex'] += 3;
        }

        if ($_POST['race'] == 3) {
            $perso['pwr'] += 3;
        }

        if ($_POST['race'] == 4) {
            $perso['mana'] += 3;
        }

        // Bonus pour les races ( 1 = Elfe, 2 = Humain, 3 = Orc, 4 = Demon ) :
        if ($_POST['race'] == 1) {
            $perso['mana'] += 3;
        }

        if ($_POST['race'] == 2) {
            $perso['pwr'] += 3;
        }

        if ($_POST['race'] == 3) {
            $perso['def'] += 3;
        }

        if ($_POST['race'] == 4) {
            $perso['mana'] += 3;
        }

        // Bonus pour les affinités :
        if ($_POST['aff'] == 'Fire') {
            $perso['pwr'] += 2;
        }

        if ($_POST['aff'] == 'Water') {
            $perso['mana'] += 2;
        }

        if ($_POST['aff'] == 'Earth') {
            $perso['def'] += 2;
        }

        if ($_POST['aff'] == 'Air') {
            $perso['vit'] += 2;
        }

        $bdd = connect();
        $sql = "INSERT INTO persos (`name`, `pwr`, `vit`, `pv`, `def`, `mana`, `dex`, `aff`,`user_id`, `xp`, `gender`, `id_race`, `id_classes`) VALUES (:name, :pwr, :vit, :pv, :def, :mana, :dex, :aff, :user_id, :xp, :gender,  :id_race, :id_classes);";
        echo $sql;
        $sth = $bdd->prepare($sql);
        $sth->execute([
            'name'   => $perso['name'],
            'pwr'    => $perso['pwr'],
            'vit'    => $perso['vit'],
            'pv'     => $perso['pv'],
            'def'    => $perso['def'],
            'mana'   => $perso['mana'],
            'dex'    => $perso['dex'],
            'aff'    => $perso['aff'],
            'user_id' => $_SESSION['user']['id'],
            'xp'     => 0,
            'gender' => $perso['gender'],
            'id_classes' => $perso['class'],
            'id_race' => $perso['race']

        ]); //-- <?php {var_dump($sth->errorInfo());die(); }
        header('Location: persos.php');
    }
}

?>

<?php require_once('_header.php'); ?>

<body>
    <h1>
        <center><b>Create your character</b></center>
    </h1>
    <form action="" method="POST">
        <div>
            <label for="name">Enter the name :</label>
            <input type="name" placeholder="Entrez le nom de votre personnage" name="name" id="name" required />
        </div>

        <div>
            <label for="class">Choose your class :</label>
            <select id="class" name="class">
                <option value="" required>--Please choose a class--</option>
                <?php foreach ($classes as $class) : ?>
                    <option value="<?php echo $class['id_classes']; ?>"><?php echo $class['nom_classe']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="race">Choose your race :</label>
            <select id="race" name="race">
                <option value="" required>--Please choose a race--</option>
                <?php foreach ($races as $race) : ?>
                    <option value="<?php echo $race['id_race']; ?>"><?php echo $race['nom_race']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="gender">Choose your gender:</label>
            <select id="gender" name="gender">
                <option value="" required>--Please choose a gender--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div>
            <label for="aff">Choose your Affinity :</label>
            <select id="aff" name="aff">
                <option value="" required>--Please choose an affinity--</option>
                <option value="Fire">Fire</option>
                <option value="Water">Water</option>
                <option value="Earth">Earth</option>
                <option value="Air">Air</option>
            </select>
        </div>

        <div class="mt-4">
            <input type="submit" class="btn btn-green" name="createNewPerso" value="Create" />
            <a class="btn btn-red" href="persos.php">Return</a>
        </div>
    </form>


</body>

</html>