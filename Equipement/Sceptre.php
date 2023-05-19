<?php 

class Sceptre extends Equipement {
    public function __construct() {
        $this->Durabilité = 20;
        $this->nom_eqp= 'Sceptre';
        $this->level_requis = 1;
        $this->classe_requises = ["Mage", "Healer"];
        $this->stat_requises = ["mana" => 8];
        $this->Bonus_stat = ["mana" => 3, "pwr" => 2];
        $this->prix_eqp = 86;
        $this->picture = 'img/Sceptre.webp';
        $this->equiper = false;
        $this->quantité = 1;
    }
}

?>
