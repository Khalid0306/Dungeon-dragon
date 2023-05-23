<?php 


require_once('./Equipement/Equipement.php');

class Gourdin extends Equipement {
    public function __construct() {
        $this->Durabilité = 20;
        $this->nom_eqp= 'Gourdin';
        $this->level_requis = 1;
        $this->classe_requises = ["Warrior", "Tank"];
        $this->stat_requises = ["pwr" => 8];
        $this->Bonus_stat = ["pwr" => 3, "def" => 3];
        $this->prix_eqp = 73;
        $this->picture = 'img/Gourdin.png';
        $this->equiper = false;
        $this->quantité = 1;
        $this->id_eqp = 6;
    }
}
?>