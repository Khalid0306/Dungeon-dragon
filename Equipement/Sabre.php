<?php 


require_once('./Equipement/Equipement.php');

class Sabre extends Equipement {
    public function __construct() {
        $this->Durabilité = 22;
        $this->nom_eqp= 'Sabre';
        $this->level_requis = 1;
        $this->classe_requises = ["Warrior", "Thief"];
        $this->stat_requises = ["pwr" => 10];
        $this->Bonus_stat = ["pwr" => 5, "vit" => 3];
        $this->prix_eqp = 98;
        $this->picture = 'img/Sabre.png';
        $this->equiper = false;
        $this->quantité = 1;
        $this->id_eqp = 3;
    }
}

 ?>