<?php require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    $bdd = connect();

    $sql="SELECT * FROM users WHERE id = :id;";

    $sth = $bdd->prepare($sql);

    $sth->execute([
        'id'   => $_SESSION['user']['id']
    ]);

    $player = $sth->fetch();
?>
<?php require_once('_header.php'); ?>
<div class="container">
<h1>Information du compte : </h1>
 <b>Email : </b><?php echo $player['email'];?>
 <div>
 <label for="password"> <b>Mot de passe : </b> </label>
    <input 
        type="password" 
        name="password" 
        id="password" 
        value="<?php echo $player['password']; ?>" 
        readonly
    />
    <a href="player_modif.php? id=<?php echo $player['id'];?>" class="btn btn-green" > Modifier </a> 
</div>
 <div class="mt-4">
    <a href="persos.php" class="btn btn-red">Retour</a>
 </div>
</div>
 