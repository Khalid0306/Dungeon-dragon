<?php 


require_once('./Equipement/Equipement.php');

class Potion_de_vie extends Equipement {
    public function __construct() {
        $this->Durabilité = 18;
        $this->nom_eqp= 'Potion_de_vie';
        $this->level_requis = 1;
        $this->Bonus_stat = ["pv" => 7];
        $this->prix_eqp = 15;
        $this->picture = 'img/Potion_de_vie.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}

?>

