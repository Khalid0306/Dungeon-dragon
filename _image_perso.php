<?php
    
    $bdd = connect();
    // Récupérer les informations de la classe du personnage
    $sql = "SELECT * FROM classes WHERE id_classes = :id_classes";
    $sth = $bdd->prepare($sql);
    $sth->execute(['id_classes' => $_SESSION['perso']['id_classes']]);
    $classes = $sth ->fetch();

    // Déterminer l'image à utiliser en fonction du sexe du personnage
    if ($_SESSION['perso']['gender'] == 'Male') {
        $image = $classes['photo_male']; 
    } else {
        $image = $classes['photo_femelle']; 
    }

    // Bonus pour les races ( 1 = Elfe, 2 = Humain, 3 = Orc, 4 = Demon ) :
    // Bonus pour les classes ( 1 = Warrior, 3 = Healer, 4 = Archer, 5 = Tank, 6 = Thief,  7 = Mage) :

    // Vérifiez la classe, la race et le sexe du personnage pour déterminer l'image
    //classe Warrior :
    if ($_SESSION['perso']['id_classes'] == 1 && $_SESSION['perso']['id_race'] == 2 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Guerrier_Humain.png';
    } elseif ($_SESSION['perso']['id_classes'] == 1 && $_SESSION['perso']['id_race'] == 2 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Guerriere_Humaine.png';
    }

    if ($_SESSION['perso']['id_classes'] == 1 && $_SESSION['perso']['id_race'] == 1 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Guerrier_elfe.png';
    } elseif ($_SESSION['perso']['id_classes'] == 1 && $_SESSION['perso']['id_race'] == 1 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Guerriere_elfe.png';
    }

    if ($_SESSION['perso']['id_classes'] == 1 && $_SESSION['perso']['id_race'] == 3 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Guerrier_Orc.png';
    } elseif ($_SESSION['perso']['id_classes'] == 1 && $_SESSION['perso']['id_race'] == 3 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Guerriere_Orc.png';
    }

    if ($_SESSION['perso']['id_classes'] == 1 && $_SESSION['perso']['id_race'] == 4 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Guerrier_Demon.png';
    } elseif ($_SESSION['perso']['id_classes'] == 1 && $_SESSION['perso']['id_race'] == 4 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Guerriere_Demon.png';
    }

    //Classe Healer:
    if ($_SESSION['perso']['id_classes'] == 3 && $_SESSION['perso']['id_race'] == 2 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Healer_Humain.png';
    } elseif ($_SESSION['perso']['id_classes'] == 3 && $_SESSION['perso']['id_race'] == 2 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Healer_Humaine.png';
    }

    if ($_SESSION['perso']['id_classes'] == 3 && $_SESSION['perso']['id_race'] == 1 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Healer_elfe_male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 3 && $_SESSION['perso']['id_race'] == 1 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Healer_Elfe_female.png';
    }

    if ($_SESSION['perso']['id_classes'] == 3 && $_SESSION['perso']['id_race'] == 3 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Healer_orc_male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 3 && $_SESSION['perso']['id_race'] == 3 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Healer_Orc_female.png';
    }

    if ($_SESSION['perso']['id_classes'] == 3 && $_SESSION['perso']['id_race'] == 4 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Healer_Demon_male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 3 && $_SESSION['perso']['id_race'] == 4 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Healer_Demon_Female.png';
    }

    //Classe Archer:
    if ($_SESSION['perso']['id_classes'] == 4 && $_SESSION['perso']['id_race'] == 2 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Archer_Humain.png';
    } elseif ($_SESSION['perso']['id_classes'] == 4 && $_SESSION['perso']['id_race'] == 2 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Archer_Humaine.png';
    }

    if ($_SESSION['perso']['id_classes'] == 4 && $_SESSION['perso']['id_race'] == 1 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Archer_elfe_male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 4 && $_SESSION['perso']['id_race'] == 1 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Archer_elfe_female.png';
    }

    if ($_SESSION['perso']['id_classes'] == 4 && $_SESSION['perso']['id_race'] == 3 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Archer_Orc_male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 4 && $_SESSION['perso']['id_race'] == 3 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Archer_Orc.png';
    }

    if ($_SESSION['perso']['id_classes'] == 4 && $_SESSION['perso']['id_race'] == 4 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Archer_Demon_male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 4 && $_SESSION['perso']['id_race'] == 4 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Archer_Demon_female.png';
    }

    //Classe Tank:
      if ($_SESSION['perso']['id_classes'] == 5 && $_SESSION['perso']['id_race'] == 2 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Tank_Humain.png';
    } elseif ($_SESSION['perso']['id_classes'] == 5 && $_SESSION['perso']['id_race'] == 2 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Tank_Humaine.png';
    }

    if ($_SESSION['perso']['id_classes'] == 5 && $_SESSION['perso']['id_race'] == 1 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Tank_elfe_male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 5 && $_SESSION['perso']['id_race'] == 1 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Tank_elfe_female.png';
    }

    if ($_SESSION['perso']['id_classes'] == 5 && $_SESSION['perso']['id_race'] == 3 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Tank_Orc.png';
    } elseif ($_SESSION['perso']['id_classes'] == 5 && $_SESSION['perso']['id_race'] == 3 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Tank_Orc_female.png';
    }

    if ($_SESSION['perso']['id_classes'] == 5 && $_SESSION['perso']['id_race'] == 4 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Tank_demon_male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 5 && $_SESSION['perso']['id_race'] == 4 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Tank_demon_female.png';
    }

    //Classe Thief:
    if ($_SESSION['perso']['id_classes'] == 6 && $_SESSION['perso']['id_race'] == 2 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Thief_Humain.png';
    } elseif ($_SESSION['perso']['id_classes'] == 6 && $_SESSION['perso']['id_race'] == 2 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Thief_Humaine.png';
    }

    if ($_SESSION['perso']['id_classes'] == 6 && $_SESSION['perso']['id_race'] == 1 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Thief_elfe_male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 6 && $_SESSION['perso']['id_race'] == 1 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Thief_elfe_female.png';
    }

    if ($_SESSION['perso']['id_classes'] == 6 && $_SESSION['perso']['id_race'] == 3 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Thief_Orc_male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 6 && $_SESSION['perso']['id_race'] == 3 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Thief_orc_female.png';
    }

    if ($_SESSION['perso']['id_classes'] == 6 && $_SESSION['perso']['id_race'] == 4 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Thief_demon_male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 6 && $_SESSION['perso']['id_race'] == 4 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Thief_demon_female.png';
    }

    //Classe Mage:
    if ($_SESSION['perso']['id_classes'] == 7 && $_SESSION['perso']['id_race'] == 2 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Mage_Humain.png';
    } elseif ($_SESSION['perso']['id_classes'] == 7 && $_SESSION['perso']['id_race'] == 2 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Mage_Humaine.png';
    }

    if ($_SESSION['perso']['id_classes'] == 7 && $_SESSION['perso']['id_race'] == 1 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Mage_elfe_Male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 7 && $_SESSION['perso']['id_race'] == 1 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Mage_efle_female.png';
    }

    if ($_SESSION['perso']['id_classes'] == 7 && $_SESSION['perso']['id_race'] == 3 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Mage_orc_male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 7 && $_SESSION['perso']['id_race'] == 3 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Mage_orc_female.png';
    }

    if ($_SESSION['perso']['id_classes'] == 7 && $_SESSION['perso']['id_race'] == 4 && $_SESSION['perso']['gender'] == 'Male') {
        $image = 'Mage_Demon_Male.png';
    } elseif ($_SESSION['perso']['id_classes'] == 7 && $_SESSION['perso']['id_race'] == 4 && $_SESSION['perso']['gender'] == 'Female') {
        $image = 'Thief_demon_female.png';
    }


    // Afficher l'image
    echo '<img src="img/' . $image . '" alt="Image du personnage" class = "perso2-img">';
            
?>
