<?php 


require_once('./Equipement/Equipement.php');


class Epée extends Equipement {
    public function __construct() {
        $this->Durabilité = 22;
        $this->nom_eqp= 'Epée';
        $this->level_requis = 1;
        $this->classe_requises = ["Warrior", "Thief"];
        $this->stat_requises = ["pwr" => 10];
        $this->Bonus_stat = ["pwr" => 5, "vit" => 2];
        $this->prix_eqp = 88;
        $this->picture = 'img/Epée.webp';
        $this->equiper = false;
        $this->quantité = 1;
    }
}
?>