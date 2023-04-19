<?php require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    $bdd = connect();

    if (isset($_POST["send"])) {
        if ($_POST['password'] != "") {
            // Récupérer le mot de passe actuel de l'utilisateur depuis la base de données
            $sql = "SELECT password FROM users WHERE id = :user_id;";
            $sth = $bdd->prepare($sql);
            $sth->execute([
            'user_id'   => $_SESSION['user']['id']
        ]);

            $current_password = $sth->fetchColumn();

            if (password_verify($_POST['old_password'], $current_password)) {
                // Mettre à jour le mot de passe
                $sql = "UPDATE users SET password = :password WHERE id = :user_id;";
                $sth = $bdd->prepare($sql);
    
                $sth->execute([
                    'user_id'   => $_SESSION['user']['id'],
                    'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ]);
                $msg = "Le mot de passe a été modifié avec succès.";
            } else {
                $msg = "L'ancien mot de passe est incorrect.";
            }
        } 
    }

?>
<?php require_once('_header.php'); ?>
<div class="container">
<h1>Modifications  : </h1>
<script>
    function checkOldPassword() {
        const oldPasswordInput = document.getElementById("old_password");
        const newPasswordInput = document.getElementById("password");

        if (oldPasswordInput.value.length > 0) {
            newPasswordInput.disabled = false;
        } else {
            newPasswordInput.disabled = true;
        }
    }
</script>
<form action="" method="POST">
<div>
    <label for="old_password">Old password : </label>
    <input 
        type="password" 
        placeholder="Entrez votre ancien mot de passe" 
        name="old_password" 
        id="old_password" 
        oninput="checkOldPassword()"
    />
    </div>
    <div>
        <label for="password">New password :</label>
        <input type="password" placeholder="Entrez votre nouveau mot de passe " name="password" id="password" disabled/>
    </div>
    <div>
        <input type="submit" name="send" value="modifier" class="btn btn-green" />
    </div>
    </form>
    <?php if (!empty($msg)) { echo "<div>" . $msg . "</div>"; } ?>
<div>
    <a href="player_show.php" class="btn btn-red">Retour</a>
 </div>

</div>
