<?php 


require_once('./Equipement/Equipement.php');

class Orb extends Equipement {
    public function __construct() {
        $this->Durabilité = 15;
        $this->nom_eqp= 'Orb';
        $this->level_requis = 1;
        $this->classe_requises = ["Mage", "Healer"];
        $this->stat_requises = ["mana" => 12];
        $this->Bonus_stat =["mana" => 3, "pwr" => 2];
        $this->prix_eqp = 94;
        $this->picture = 'img/Orb.png';
        $this->equiper = false;
        $this->quantité = 1;
        $this->id_eqp = 5;
    }
}

?>