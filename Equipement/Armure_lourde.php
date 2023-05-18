<?php 


require_once('./Equipement/Equipement.php');

class Armure_lourde extends Equipement {
    public function __construct() {
        $this->Durabilité = 26;
        $this->nom_eqp= 'Armure_lourde';
        $this->level_requis = 1;
        $this->classe_requises = ["Warrior", "Tank"];
        $this->stat_requises = ["def" => 12, "vit" => 4];
        $this->Bonus_stat = ["def" => 6, "vit" => -2];
        $this->prix_eqp = 29;
        $this->picture = 'img/armure_lourde.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}

?>