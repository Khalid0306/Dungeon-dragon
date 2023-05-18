<?php 


require_once('./Equipement/Equipement.php');

class Orb extends Equipement {
    public function __construct() {
        $this->Durabilité = 18;
        $this->nom_eqp= 'Orb';
        $this->level_requis = 1;
        $this->classe_requises = ["Mage", "Healer"];
        $this->stat_requises = ["mana" => 8];
        $this->Bonus_stat = ["mana" => 4, "def" => 2];
        $this->prix_eqp = 20;
        $this->picture = 'img/Orb.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}

?>