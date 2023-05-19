<?php 


require_once('./Equipement/Equipement.php');

class Casque_lourd extends Equipement {
    public function __construct() {
        $this->Durabilité = 30;
        $this->nom_eqp= 'Casque lourd';
        $this->level_requis = 1;
        $this->classe_requises = ["Warrior", "Tank"];
        $this->stat_requises = ["def" => 12];
        $this->Bonus_stat = ["def" => 4, "mana" => 3];
        $this->prix_eqp = 87;
        $this->picture = 'img/casque_lourd.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}

?>