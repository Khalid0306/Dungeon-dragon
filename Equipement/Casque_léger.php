<?php 


require_once('./Equipement/Equipement.php');

class Casque_léger extends Equipement {
    public function __construct() {
        $this->Durabilité = 18;
        $this->nom_eqp= 'Casque_léger';
        $this->level_requis = 1;
        $this->classe_requises = ["Mage", "Thief", "Healer"];
        $this->stat_requises = ["def" => 6, "mana" => 5];
        $this->Bonus_stat = ["def" => 3, "mana" => 2];
        $this->prix_eqp = 22;
        $this->picture = 'img/casque_leger.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}


?>