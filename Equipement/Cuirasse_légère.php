<?php 


require_once('./Equipement/Equipement.php');

class Cuirrasse_légère extends Equipement {
    public function __construct() {
        $this->Durabilité = 20;
        $this->nom_eqp= 'Cuirrasse_légère';
        $this->level_requis = 1;
        $this->classe_requises = ["Healer", "Mage","Thief"];
        $this->stat_requises = ["def" => 8];
        $this->Bonus_stat = ["def" => 4, "mana" => 3];
        $this->prix_eqp = 23;
        $this->picture = 'img/cuirrasse_légère.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}


?>