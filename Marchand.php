<?php
    require_once('functions.php');
    
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }

    require_once('_header.php');
    require_once('./Equipement/Armure_légère.php');
    require_once('./Equipement/Armure_lourde.php');
    require_once('./Equipement/Botte_légère.php');
    require_once('./Equipement/Botte_lourde.php');
    require_once('./Equipement/Bouclier.php');
    require_once('./Equipement/Casque_léger.php');
    require_once('./Equipement/Casque_lourd.php');
    require_once('./Equipement/Cuirasse_légère.php');
    require_once('./Equipement/Cuirasse_lourde.php');
    require_once('./Equipement/Dague.php');
    require_once('./Equipement/Epée.php');
    require_once('./Equipement/Gantelet_léger.php');
    require_once('./Equipement/Gantelet_lourd.php');
    require_once('./Equipement/Gourdin.php');
    require_once('./Equipement/Orb.php');
    require_once('./Equipement/Potion_vie.php');
    require_once('./Equipement/Sabre.php');
    require_once('./Equipement/Sceptre.php');
    require_once('./Equipement/Toge.php');
?>
<div class="container"> 
    <h1>The Enchanted store</h1>
    <div class="px-4">
    <?php 
        $nb = random_int(0,10); 
            
        $equipements = [];;
    
             if ($nb <= 2) {
                $equipements[] = new Gourdin ();
                $equipements[] = new Toge ();
                $equipements[] = new Botte_légère ();
                $equipements[] = new Sabre ();
             } else if ($nb <= 4) {
                $equipements[] = new Sceptre();
                $equipements[] = new Casque_lourd ();
                $equipements[] = new Potion_de_vie ();
                $equipements[] = new Gantelet_leger ();
             } else if ($nb <= 6) {
                $equipements[] = new Cuirrasse_légère();
                $equipements[] = new Armure_lourde ();
                $equipements[] = new Bouclier ();
                $equipements[] = new Dague();
            } else if ($nb <= 8) {
                $equipements[] = new Armure_légère();
                $equipements[] = new Orb ();
                $equipements[] = new Epée ();
                $equipements[] = new Casque_léger ();
            } else {
                $equipements[] = new Gantelet_lourd();
                $equipements[] = new Botte_lourde ();
                $equipements[] = new Cuirasse_lourde ();
            } 
     
        
            foreach ($equipements as $equipement) {
                include '_show_equipement.php';
            }
    ?>
    </div>
</div>
<div class="container marchand-img">
<div class="dialog-bubble">
    <?php 
        $marchand_nb = random_int(1,10);

        if ($marchand_nb <= 4) {
            echo "Greetings, brave wanderer! Have you come in search of rare artifacts?";
        } else if ($marchand_nb<= 6) {
            echo "Ah, a keen eye for quality I see! My wares won't disappoint!";
        } else if ($marchand_nb <= 8) {
            echo "Look closely, adventurer, treasures are hidden among the mundane.";
        } else {
            echo "Farewell! May fortune favor you, and my goods serve you well!";
        }
    ?>    
    </div>
    <img class="" src="img/image marchand.png" alt="image marchand">
 </div>

 