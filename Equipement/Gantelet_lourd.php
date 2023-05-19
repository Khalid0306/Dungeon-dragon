<?php 


require_once('./Equipement/Equipement.php');

class Gantelet_lourd extends Equipement {
    public function __construct() {
        $this->Durabilité = 22;
        $this->nom_eqp= 'Gantelet lourd';
        $this->level_requis = 1;
        $this->classe_requises = ["Warrior", "Tank"];
        $this->stat_requises = ["pwr" => 9, "def" => 9];
        $this->Bonus_stat = ["pwr" => 4, "def" => 4];
        $this->prix_eqp = 69;
        $this->picture = 'img/gantelet_lourd.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}

?>
