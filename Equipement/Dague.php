<?php 


require_once('./Equipement/Equipement.php');

class Dague extends Equipement {
    public function __construct() {
        $this->Durabilité = 18;
        $this->nom_eqp= 'Dague';
        $this->level_requis = 1;
        $this->classe_requises = ["Thief", "Archer"];
        $this->stat_requises = ["pwr" => 7, "vit" => 10];
        $this->Bonus_stat = ["vit" => 5, "dex" => 3];
        $this->prix_eqp = 24;
        $this->picture = 'img/Dague.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}

?>