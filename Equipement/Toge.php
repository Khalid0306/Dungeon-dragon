<?php 


require_once('./Equipement/Equipement.php');


class Toge extends Equipement {
    public function __construct() {
        $this->Durabilité = 15;
        $this->nom_eqp= 'Toge';
        $this->level_requis = 1;
        $this->classe_requises = ["Mage", "Healer"];
        $this->stat_requises = ["mana" => 10];
        $this->Bonus_stat = ["mana" => 2, "def" => 1];
        $this->prix_eqp = 17;
        $this->picture = 'img/Toge.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}
?>