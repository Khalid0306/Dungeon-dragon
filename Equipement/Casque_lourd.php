<?php 


require_once('./Equipement/Equipement.php');

class Casque_lourd extends Equipement {
    public function __construct() {
        $this->Durabilité = 21;
        $this->nom_eqp= 'Casque_lourd';
        $this->level_requis = 1;
        $this->classe_requises = ["Warrior", "Tank"];
        $this->stat_requises = ["def" => 9];
        $this->Bonus_stat = ["def" => 5, "pwr" => 2];
        $this->prix_eqp = 27;
        $this->picture = 'img/casque_lourd.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}

?>