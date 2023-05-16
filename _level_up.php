<?php


    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }
    $bdd= connect();

    $sql = " SELECT persos.*, classes.nom_classe AS class_name, races.nom_race AS race_name FROM persos LEFT JOIN classes ON persos.id_classes = classes.id_classes LEFT JOIN races ON persos.id_race = races.id_race WHERE persos.user_id = :user_id";

    $sth= $bdd->prepare($sql);
    
    $sth->execute([
        'user_id'        =>$_SESSION['user']['id']
    ]);

    $persos = $sth ->fetchAll();

    //dd($persos);

$isLevelUp = false;

    if ($_SESSION['perso']['xp'] >= 15 && $_SESSION['perso']['level'] == 0 ) {
        $_SESSION['perso']['level'] += 1;
        $_SESSION['perso']['xp'] -= 15 ;
        $isLevelUp = true;
    }

    if ($_SESSION['perso']['xp'] >= 30 && $_SESSION['perso']['level'] == 1) {
        $_SESSION['perso']['level'] += 1;
        $_SESSION['perso']['xp'] -= 30 ;
        $isLevelUp = true;
    } 

    if ($_SESSION['perso']['xp'] >= 45 && $_SESSION['perso']['level'] == 2) {
        $_SESSION['perso']['level'] += 1;
        $_SESSION['perso']['xp'] -= 45 ;
        $isLevelUp = true;
    }
    
    if ($_SESSION['perso']['xp'] >= 60 && $_SESSION['perso']['level'] == 3) {
        $_SESSION['perso']['level'] += 1;
        $_SESSION['perso']['xp'] -= 60 ;
        $isLevelUp = true;
    } 
    
    if ($_SESSION['perso']['xp'] >= 75 && $_SESSION['perso']['level'] == 4) {
        $_SESSION['perso']['level'] += 1;
        $_SESSION['perso']['xp'] -= 75 ;
        $isLevelUp = true;
    } 
    
    if ($_SESSION['perso']['xp'] >= 90 && $_SESSION['perso']['level'] == 5) {
        $_SESSION['perso']['level'] += 1;
        $_SESSION['perso']['xp'] -= 90 ;
        $isLevelUp = true;
    } 
    
    if ($_SESSION['perso']['xp'] >= 105 && $_SESSION['perso']['level'] == 6) {
        $_SESSION['perso']['level'] += 1;
        $_SESSION['perso']['xp'] -= 105 ;
        $isLevelUp = true;
    } 
    
    if ($_SESSION['perso']['xp'] >= 120 && $_SESSION['perso']['level'] == 7) {
        $_SESSION['perso']['level'] += 1;
        $_SESSION['perso']['xp'] -= 120 ;
        $isLevelUp = true;
    } 
    
    if ($_SESSION['perso']['xp'] >= 135 && $_SESSION['perso']['level'] == 8) {
        $_SESSION['perso']['level'] += 1;
        $_SESSION['perso']['xp'] -= 135 ;
        $isLevelUp = true;
    } 
    
    if ($_SESSION['perso']['xp'] >= 150 && $_SESSION['perso']['level'] == 9) {
        $_SESSION['perso']['level'] += 1;
        $_SESSION['perso']['xp'] -= 150 ;
        $isLevelUp = true;
    } 
    
    if ($_SESSION['perso']['xp'] >= 165 && $_SESSION['perso']['level'] == 10) {
        $_SESSION['perso']['level'] += 1;
        $_SESSION['perso']['xp'] -= 165 ;
        $isLevelUp = true;
    } 
    
    if ($_SESSION['perso']['xp'] >= 180 && $_SESSION['perso']['level'] == 11) {
        $_SESSION['perso']['level'] += 1;
        $_SESSION['perso']['xp'] -= 180 ;
        
    }
    
    if ($isLevelUp) {
        // Sauvegarde de l'état de votre personnage
        $bdd = connect();
        $sql = "UPDATE persos SET `level` = :level, `xp` = :xp WHERE id = :id AND user_id = :user_id;";    
        $sth = $bdd->prepare($sql);

        $sth->execute([
            'level'      => $_SESSION['perso']['level'],
            'xp'      => $_SESSION['perso']['xp'],
            'id'        => $_SESSION['perso']['id'],
            'user_id'   => $_SESSION['user']['id']
        ]);
    }
 
            
?>
