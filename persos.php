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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once('nav.php'); ?>
    <h1><?php echo $_SESSION['user']['email']; ?> Vos personnages</h1>
    <a href="perso_add.php">Creer votre personnage</a>
</body>
</html>

