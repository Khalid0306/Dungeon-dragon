<?php
    require_once('./Classes/Gobelin.php');
    require_once('./Classes/Dark_knight.php');
    
    require_once('functions.php');
  

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }

    if (!isset($_SESSION['fight'])) 
    {
       $nb = random_int(0,10); 

       if ($nb <= 8) {
        $ennemi = new Gobelin ();
       }else {
        $ennemi = new Dark_knight();
       }

       $_SESSION['fight']['ennemi'] = $ennemi;
       $_SESSION['fight']['html'] []= "Vous tombez sur un ". $ennemi->nom. '.';

       
    if ($_SESSION['fight']['ennemi']->speed > $_SESSION['perso']['vit']){
        $_SESSION['fight']['html'] []= $ennemi -> nom  .' tape en premiére ';
    } else {
        $_SESSION['fight']['html'] []= $_SESSION ['perso']['name'].' tape en premier' ;

        $touche = random_int(0,20);
        $_SESSION['fight']['html'] []= $touche ;

        if ($touche >= 10){
            $_SESSION['fight']['html'] []= "Vous touchez votre ennemi" ;
            $degat = random_int(0,10) + ($_SESSION ['perso']['power']/3);
            $_SESSION['fight']['html'] []= $touche ;
            $_SESSION ['fight']['ennemi']-> pv -= $degat;
            if ( $_SESSION ['fight']['ennemi']-> pv > 0) {
                $_SESSION['fight']['html'] []= "Vous avez tué votre ennemi" ;
            }
        } else {
            $_SESSION['fight']['html'] []= "Vous ratez votre ennemi" ;
        }
    }

       require_once('_header.php');

    }
?>
<div class="px-4">
    <?php require_once('_perso.php'); ?>
</div>
<div class="">
        <h1>Combat</h1>
        <?php

            foreach($_SESSION['fight']['html'] as $html) {
                echo '<p>' .$html. '<p>';
            }
        ?>

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

    </body>
</html>