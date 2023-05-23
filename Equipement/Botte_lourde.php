<?php 


require_once('./Equipement/Equipement.php');

class Botte_lourde extends Equipement {
    public function __construct() {
        $this->Durabilité = 22;
        $this->nom_eqp= 'Botte lourde';
        $this->level_requis = 1;
        $this->classe_requises = ["Warrior", "Tank"];
        $this->stat_requises = ["def" => 8, "vit" => 5];
        $this->Bonus_stat = ["def" => 4, "vit" => -1];
        $this->prix_eqp = 75;
        $this->picture = 'img/Botte_lourde.png';
        $this->equiper = false;
        $this->quantité = 1;
        $this->id_eqp = 15;
    }
}

?>