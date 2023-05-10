<?php

    require_once('./Classes/Gobelin.php');
    require_once('./Classes/Dark_Knight.php');
    
    require_once('functions.php');
  

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }

    if (!isset($_SESSION['fight']))  {
       $nb = random_int(0,10); 

       if ($nb <= 6) {
        $ennemi = new Gobelin ();
       } else {
        $ennemi = new Dark_knight();
       }

       $_SESSION['fight']['ennemi'] = $ennemi;
       $_SESSION['fight']['html'] []= "Vous tombez sur un ". $ennemi->nom. '.';
    }

       
    if ($_SESSION['fight']['ennemi']->Vitesse > $_SESSION['perso']['vit']){
        $_SESSION['fight']['html'] []= $ennemi -> nom  .' tape en premier ';
        
        $touche = random_int(0, 20);
        $_SESSION['fight']['html'][] = $touche;

        
        if ($touche >= 10) {
            $_SESSION['fight']['html'][] = "Il vous touche.";
            $degat = random_int(0, $_SESSION['fight']['ennemi']->puissance) + floor($_SESSION['fight']['ennemi']->puissance/3);
            $_SESSION['fight']['html'][] = "Il vous inflige " . ($degat - floor($_SESSION['perso']['pwr']/3)) . " dégats";
            $_SESSION['perso']['pv'] -=  $degat - floor($_SESSION['perso']['pwr']/3);
        } else {
            $_SESSION['fight']['html'][] = "Il vous rate.";
        }

        if ($_SESSION['perso']['pv'] <= 0) {
            $_SESSION['fight']['html'][] = "Vous etes mort."; 
        } else {
            $_SESSION['fight']['html'][] = "Vous attaquez";
            
            $touche = random_int(0,20);
            $_SESSION['fight']['html'] []= $touche ;
        }

        if ($touche >= 10){
            $_SESSION['fight']['html'] []= "Vous touchez votre ennemi" ;
            $degat = random_int(0,10) + floor($_SESSION ['perso']['pwr']/3);
            
            $_SESSION['fight']['html'][] = "Vous lui infligez " . ($degat - floor($_SESSION['fight']['ennemi']->constitution/3)) . " dégats";
            $_SESSION['fight']['ennemi']->pv -=  $degat - floor($_SESSION['fight']['ennemi']->constitution/3);
            
            if ($_SESSION ['fight']['ennemi']-> pv <= 0) {
                $_SESSION['perso']['gold'] += $_SESSION['fight']['ennemi']->gold;
                $_SESSION['fight']['html'][] = "Vous gagnez " . $_SESSION['fight']['ennemi']->gold . " piece d'or";
                $_SESSION['fight']['html'] []= "Vous avez tué votre ennemi" ;
            }
        } else {
             $_SESSION['fight']['html'] []= "Vous ratez votre ennemi" ;
        }
    } else {
        $_SESSION['fight']['html'][] = $_SESSION['perso']['name'] . ' tape en premier';
    
        $touche = random_int(0, 20);
        $_SESSION['fight']['html'][] = $touche;

        if ($touche >= 10) {
            $_SESSION['fight']['html'][] = "Vous touchez votre ennmi.";
            $degat = random_int(0,10) + floor($_SESSION['perso']['pwr']/3);
            $_SESSION['fight']['html'][] = "Il vous inflige " . ($degat - floor($_SESSION['fight']['ennemi']->constitution/3)) . " dégats";
            $_SESSION['fight']['ennemi']->pv -=  $degat - floor($_SESSION['fight']['ennemi']->constitution/3);

        
            if ($_SESSION['fight']['ennemi']->pv <= 0) {
                $_SESSION['perso']['gold'] += $_SESSION['fight']['ennemi']->gold;
                $_SESSION['fight']['html'][] = "Vous gagnez " . $_SESSION['fight']['ennemi']->gold . " Or";
                $_SESSION['fight']['html'][] = "Vous avez tuez votre ennemi.";
            } else {
                $_SESSION['fight']['html'][] = "Votre ennemi attaque";
                $touche = random_int(0, 20);
                $_SESSION['fight']['html'][] = $touche;

                if ($touche >= 10) {
                    $_SESSION['fight']['html'][] = "Il vous touche.";
                    $degat = random_int(0,$_SESSION['fight']['ennemi']->puissance) + floor($_SESSION['fight']['ennemi']->puissance/3);
                    $_SESSION['fight']['html'][] = "Il vous inflige " . ($degat - floor($_SESSION['perso']['pwr']/3)) . " dégats";
                    $_SESSION['perso']['pv'] -=  $degat - floor($_SESSION['perso']['pwr']/3);
                } else {
                    $_SESSION['fight']['html'][] = "Il vous rate votre ennmi.";
                }
            }
        } else {
            $_SESSION['fight']['html'][] = "Vous ratez votre ennmi.";

            // Attaque de l'ennemi
            $_SESSION['fight']['html'][] = "Votre ennemi attaque";
            $touche = random_int(0, 20);
            $_SESSION['fight']['html'][] = $touche;

            if ($touche >= 10) {
                $_SESSION['fight']['html'][] = "Il vous touche.";
                $degat = random_int(0,$_SESSION['fight']['ennemi']->puissance) + floor($_SESSION['fight']['ennemi']->puissance/3);
                $_SESSION['fight']['html'][] = "Il vous inflige " . ($degat - floor($_SESSION['perso']['pwr']/3)) . " dégats";
                $_SESSION['perso']['pv'] -=  $degat - floor($_SESSION['perso']['pwr']/3);
            
                if ($_SESSION['perso']['pv'] <= 0) {
                    $_SESSION['fight']['html'][] = "Vous etes mort.";
                }
            } else {
                $_SESSION['fight']['html'][] = "Il vous rate ennmi.";
            }
        }
    }

    // Sauvegarde de l'état de votre personnage
    $bdd = connect();
    $sql = "UPDATE persos SET `gold` = :gold, `pv` = :pv WHERE id = :id AND user_id = :user_id;";    
    $sth = $bdd->prepare($sql);

    $sth->execute([
        'gold'      => $_SESSION['perso']['gold'],
        'pv'       => $_SESSION['perso']['pv'],
        'id'        => $_SESSION['perso']['id'],
        'user_id'   => $_SESSION['user']['id']
    ]);

    // dd($_SESSION);

    if ($_SESSION['perso']['pv'] <= 0) {
        unset($_SESSION['perso']);
        unset($_SESSION['fight']);
        header('Location: persos.php');
    }

    require_once('_header.php');
    ?>

    <style>
    body {
        background-image: url(img/environnement-arriere-plan-du-portail-magique-2d-pour-jeu-mobile-arene-combat-generative-ai_742252-13929.jpg);
        background-size: cover;
    }
    </style>

    <?php require_once('_header.php'); ?>
    <div 
        class="container"
        style="background-color: rgba(255,255,255, 0.2)"
    >
        <div class="container">
            <div class="row mt-4">
                
                    <div class="px-4">
                        <?php require_once('_perso.php'); ?>
                    </div>
                    <div class="w-60">
                        <h1>Combat</h1>
                        <?php
    
                            foreach($_SESSION['fight']['html'] as $html) {
                                echo '<div>'.$html.'</div>';
                            }
    
                        ?>
                        <?php if ($_SESSION['perso']['pv'] > 0) { ?>
                            <?php if ($_SESSION['fight']['ennemi']->pv > 0) { ?>
                                <a class="btn btn-green" href="donjon_fight.php?id=<?php echo $_GET['id']; ?>">
                                    Attaquer
                                </a>
                                <a class="btn btn-blue" href="donjons_play.php?id=<?php echo $_GET['id']; ?>">
                                    Fuir
                                </a>
                            <?php } else { ?>
                                <a class="btn btn-green" href="donjons_play.php?id=<?php echo $_GET['id']; ?>">
                                    Continuer l'exploration
                                </a>
                            <?php } ?>
                        <?php } else { ?>
    
                            <div class="alert">Vous êtes mort au combat</div>
                            <a class="btn btn-green" href="persos.php?msg=Votre personnage est mort">Choisir un nouveau personnage</a>
                        <?php } ?>
                    </div>
                <div class="px-4">
                    <?php require_once('_ennemi.php'); ?>
                </div>
            </div>
        </div>
            <?php
            if ($_SESSION['perso']['pv'] <= 0) {
                unset($_SESSION['perso']);
                unset($_SESSION['fight']);
            }
        ?>
        </body>
    </html>