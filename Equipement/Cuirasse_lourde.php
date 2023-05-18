<?php 


require_once('./Equipement/Equipement.php');

class Cuirasse_lourde extends Equipement {
    public function __construct() {
        $this->Durabilité = 25;
        $this->nom_eqp= 'Cuirasse_lourde';
        $this->level_requis = 1;
        $this->classe_requises = ["Warrior", "Tank"];
        $this->stat_requises = ["def" => 12];
        $this->Bonus_stat = ["def" => 6, "vit" => -2];
        $this->prix_eqp = 28;
        $this->picture = 'img/cuirasse_lourd.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}


?>

