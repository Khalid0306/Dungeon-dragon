<?php 
    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
    
    if (!isset($_GET['id'])) {
        header('Location: Marchand.php?msg=id non passé !');
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

    //pour afficher le nom des races et des classes au lieu de leur id
    $sql = "SELECT persos.*, classes.nom_classe AS class_name, races.nom_race AS race_name FROM persos INNER JOIN classes ON persos.id_classes = classes.id_classes INNER JOIN races ON persos.id_race = races.id_race 
        WHERE persos.id = :id AND persos.user_id = :user_id ";
    $sth = $bdd->prepare($sql);
    $sth->execute([
        'id'        => $_GET['id'],
        'user_id'   => $_SESSION['user']['id']
    ]);
    $perso = $sth->fetch();

    if (isset($_POST['Buy']) && $perso['gold'] >= $equipement->prix_eqp) {
        // Verifier si le personnage à la classe requise
        if (in_array($perso['class_name'], $equipement->classe_requises)) {

            // Pour chaque statistique requise par l'équipement
            foreach ($equipement->stat_requises as $stat => $requiredValue) {

            // Récupérer la valeur actuelle de cette stat pour le personnage
                $currentValue = $perso[$stat];

            // Si le personnage n'a pas assez de cette stat
            if ($currentValue < $requiredValue) {
                header('Location: Marchand.php?id=' . $perso['id'] . '&msg=Statistique insuffisante pour cet équipement');
                exit();
            }
        }

        $perso['gold'] -= $equipement->prix_eqp;
        
        if ($perso['gold'] < 0) {
            $perso['gold'] = 0; 
        }

        // Récupérer l'inventaire actuel
        $inventory = json_decode($perso['inventaire'], true);

        // Ajouter le nouvel équipement
        $inventory[] = [
            'name' => $equipement->nom_eqp,
            'level' =>  $equipement->level_requis,
            'picture' => $equipement->picture,
            'Durability' => $equipement->Durabilité,
            'Bonus' => $equipement->Bonus_stat,
        ];

        // Réencoder l'inventaire en JSON
        $newInventory = json_encode($inventory);

        $sql = "UPDATE persos SET `gold` = :gold, `inventaire` = :inventaire WHERE id = :id AND user_id = :user_id";
        $sth = $bdd->prepare($sql);
        $sth->execute([
            'gold'       => $perso['gold'],
            'inventaire' => $newInventory,
            'id'       => $perso['id'],
            'user_id'  => $_SESSION['user']['id']
        ]);
        
        header('Location: Marchand.php?id=' . $perso['id']);
        exit();
    }
    }
?>