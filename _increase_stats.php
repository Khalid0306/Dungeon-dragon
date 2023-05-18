<?php 
require_once('functions.php');

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_POST['id'])) {
    header('Location: persos.php?msg=id non passé !');
    exit();
}

$bdd = connect();
$sql = "SELECT * FROM persos WHERE id = :id AND user_id = :user_id";
$sth = $bdd->prepare($sql);
$sth->execute([
    'id'        => $_POST['id'],
    'user_id'   => $_SESSION['user']['id']
]);
$perso = $sth->fetch();

if (!$perso) {
    header('Location: persos.php?msg=Personnage non trouvé !');
    exit();
}


if (isset($_POST['stat']) && $perso['pts de competence'] > 0) {
    $stat = $_POST['stat'];

    $perso[$stat]++;
    $perso['pts de competence']--;

    // Réinitialiser à zéro si négatif
    if ($perso['pts de compétence'] < 0) {
        $perso['pts de compétence'] = 0; 
    }
    $sql = "UPDATE persos SET `pv` = :pv, `pwr` = :pwr, `dex` = :dex, `def` = :def, `mana` = :mana, `vit` = :vit, `pts de competence` = :pts WHERE id = :id AND user_id = :user_id";
    $sth = $bdd->prepare($sql);
    $sth->execute([
        'pv'       => $perso['pv'],
        'pwr'      => $perso['pwr'],
        'dex'      => $perso['dex'],
        'def'      => $perso['def'],
        'mana'     => $perso['mana'],
        'vit'      => $perso['vit'],
        'pts'      => $perso['pts de competence'],
        'id'       => $perso['id'],
        'user_id'  => $_SESSION['user']['id']
    ]);
    

    header('Location: persos_show.php?id=' . $perso['id']);
    exit();
}else {
    header('Location: persos_show.php?id=' . $perso['id'] . '&msg=Action non valide');
    exit();
}
?>
