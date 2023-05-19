<?php

    require_once('./Classes/Goblin.php');
    require_once('./Classes/Dark_Knight.php');
    require_once('./Classes/Araignée.php');
    require_once('./Classes/Skeleton_knight.php');
    require_once('functions.php');
    
  

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }

    
    // dd($persos);

    if (!isset($_SESSION['fight']))  {
       $nb = random_int(0,10); 

        if ($nb <= 4) {
            $ennemi = new Goblin ();
        } else if ($nb <= 6) {
            $ennemi = new Skeleton_knight();
        } else if ($nb <= 8) {
            $ennemi = new Araignée();
        } else {
            $ennemi = new Dark_knight();
        } 

       $_SESSION['fight']['ennemi'] = $ennemi;
       $_SESSION['fight']['html'] []= "You come across a ". $ennemi->nom. '.';
    }
       
    if ($_SESSION['fight']['ennemi']->Vitesse > $_SESSION['perso']['vit']){
        $_SESSION['fight']['html'] []= $ennemi -> nom  .' attack first ';
        
        $touche = random_int(0, 20);
        $_SESSION['fight']['html'][] = $touche;

        
        if ($touche >= 10) {
            $_SESSION['fight']['html'][] = "He touches you.";
            $degat = random_int(0, $_SESSION['fight']['ennemi']->puissance) + floor($_SESSION['fight']['ennemi']->puissance/3);
            $_SESSION['fight']['html'][] = "He inflicts you " . ($degat - floor($_SESSION['perso']['pwr']/3)) . " damage";
            $_SESSION['perso']['pv'] -=  $degat - floor($_SESSION['perso']['pwr']/3);
        } else {
            $_SESSION['fight']['html'][] = "Your ennemy misses you.";
        }

        if ($_SESSION['perso']['pv'] <= 0) {
            $_SESSION['fight']['html'][] = "You are dead."; 
        } else {
            $_SESSION['fight']['html'][] = "You attack";
            
            $touche = random_int(0,20);
            $_SESSION['fight']['html'] []= $touche ;
        }

        if ($touche >= 10){
            $_SESSION['fight']['html'] []= "You touch your ennemy" ;
            $degat = random_int(0,10) + floor($_SESSION ['perso']['pwr']/3);
            
            $_SESSION['fight']['html'][] = "You inflict him " . ($degat - floor($_SESSION['fight']['ennemi']->constitution/3)) . " damage";
            $_SESSION['fight']['ennemi']->pv -=  $degat - floor($_SESSION['fight']['ennemi']->constitution/3);
            
            if ($_SESSION ['fight']['ennemi']-> pv <= 0) {
                $_SESSION['perso']['gold'] += $_SESSION['fight']['ennemi']->gold;
                $_SESSION['fight']['html'][] = "You win " . $_SESSION['fight']['ennemi']->gold . " gold coin";
                $_SESSION['fight']['html'] []= "You killed your enemy" ;
            }
        } else {
             $_SESSION['fight']['html'] []= "You miss your enemy" ;
        }
    } else {
        $_SESSION['fight']['html'][] = $_SESSION['perso']['name'] . ' attack first';
    
        $touche = random_int(0, 20);
        $_SESSION['fight']['html'][] = $touche;

        if ($touche >= 10) {
            $_SESSION['fight']['html'][] = "You touch your enemy.";
            $degat = random_int(0,10) + floor($_SESSION['perso']['pwr']/3);
            $_SESSION['fight']['html'][] = "You inflict him " . ($degat - floor($_SESSION['fight']['ennemi']->constitution/3)) . " damages";
            $_SESSION['fight']['ennemi']->pv -=  $degat - floor($_SESSION['fight']['ennemi']->constitution/3);

        
            if ($_SESSION['fight']['ennemi']->pv <= 0) {
                $_SESSION['perso']['gold'] += $_SESSION['fight']['ennemi']->gold;
                $_SESSION['perso']['xp'] += $_SESSION['fight']['ennemi']->xp;
                $_SESSION['fight']['html'][] = "You win " . $_SESSION['fight']['ennemi']->gold . " gold coin and ". $_SESSION['fight']['ennemi']->xp ." Xp.";
                $_SESSION['fight']['html'][] = "You killed your enemy.";
            } else {
                $_SESSION['fight']['html'][] = "Your enemy is attacking";
                $touche = random_int(0, 20);
                $_SESSION['fight']['html'][] = $touche;

                if ($touche >= 10) {
                    $_SESSION['fight']['html'][] = "He touches you.";
                    $degat = random_int(0,$_SESSION['fight']['ennemi']->puissance) + floor($_SESSION['fight']['ennemi']->puissance/3);
                    $_SESSION['fight']['html'][] = "He inflicts you " . ($degat - floor($_SESSION['perso']['pwr']/3)) . " damages.";
                    $_SESSION['perso']['pv'] -=  $degat - floor($_SESSION['perso']['pwr']/3);
                } else {
                    $_SESSION['fight']['html'][] = "Your enemy misses you.";
                }
            }
        } else {
            $_SESSION['fight']['html'][] = "You miss your enemy.";

            // Attaque de l'ennemi
            $_SESSION['fight']['html'][] = "Your enemy is attacking";
            $touche = random_int(0, 20);
            $_SESSION['fight']['html'][] = $touche;

            if ($touche >= 10) {
                $_SESSION['fight']['html'][] = "He touches you.";
                $degat = random_int(0,$_SESSION['fight']['ennemi']->puissance) + floor($_SESSION['fight']['ennemi']->puissance/3);
                $_SESSION['fight']['html'][] = "He inflicts you " . ($degat - floor($_SESSION['perso']['pwr']/3)) . " damages";
                $_SESSION['perso']['pv'] -=  $degat - floor($_SESSION['perso']['pwr']/3);
            
                if ($_SESSION['perso']['pv'] <= 0) {
                    $_SESSION['fight']['html'][] = "You are dead.";
                }
            } else {
                $_SESSION['fight']['html'][] = "Your enemy misses you.";
            }
        }
    }

    require_once('_level_up.php');

    // Sauvegarde de l'état de votre personnage
    $bdd = connect();
    $sql = "UPDATE persos SET `gold` = :gold, `pv` = :pv, `level` = :level, `xp` = :xp WHERE id = :id AND user_id = :user_id;";    
    $sth = $bdd->prepare($sql);

    $sth->execute([
        'gold'      => $_SESSION['perso']['gold'],
        'xp'      => $_SESSION['perso']['xp'],
        'level'      => $_SESSION['perso']['level'],
        'pv'       => $_SESSION['perso']['pv'],
        'id'        => $_SESSION['perso']['id'],
        'user_id'   => $_SESSION['user']['id']
    ]);
    

    // dd($_SESSION);
    require_once('_header.php');
    ?>

    <style>
    body {
        background-image: url(img/brian-lindahl-boss-fight-lindahl-concept.jpg);
        background-size: cover;
    }
    </style>

    <?php require_once('_header.php'); ?>
    <div 
        class="container"
        style="background-color: rgba(300,255,255, 0.2)"
    >
        <div class="container">
            <div class="row mt-4">
                    <div class="px-4">
                        <?php require_once('_perso.php'); ?>
                        <?php require_once('_image_perso.php'); ?>
                    </div>
                    <div class="w-60">
                        <h1>Battle</h1>
                        <?php
                            foreach($_SESSION['fight']['html'] as $html) {
                                echo '<div>'.$html.'</div>';
                            }
    
                        ?>
                        <?php if ($_SESSION['perso']['pv'] > 0) { ?>
                            <?php if ($_SESSION['fight']['ennemi']->pv > 0) { ?>
                                <a class="btn btn-green" href="donjon_fight.php?id=<?php echo $_GET['id']; ?>">
                                    Attack
                                </a>
                                <a class="btn btn-blue" href="donjons_play.php?id=<?php echo $_GET['id']; ?>">
                                    Run away
                                </a>
                            <?php } else { ?>
                                <a class="btn btn-green" href="donjons_play.php?id=<?php echo $_GET['id']; ?>">
                                    Continue exploring
                                </a>
                            <?php } ?>
                        <?php } else { ?>
    
                            <div class="alert">You died in battle</div>
                            <a class="btn btn-green" href="persos.php?msg=Votre personnage est mort">Choose a new character</a>
                        <?php } ?>
                    </div>
                <div class="px-4">
                    <?php require_once('_ennemi.php'); ?>
                    <br>
                    <img class="ennemi-img" src="<?php echo $_SESSION['fight']['ennemi']->picture; ?>" alt="Image de l'ennemi">
                </div>
            </div>
        </div>
            <?php
            if ($_SESSION['perso']['pv'] <= 0) {
                unset($_SESSION['perso']);
                unset($_SESSION['fight']);
                header('Location: game_over.php');
            }
        ?>
        </body>
    </html>