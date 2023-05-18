<?php 


require_once('./Equipement/Equipement.php');

class Bouclier extends Equipement {
    public function __construct() {
        $this->Durabilité = 24;
        $this->nom_eqp= 'Bouclier';
        $this->level_requis = 1;
        $this->classe_requises = ["Warrior", "Tank"];
        $this->stat_requises = ["def" => 10];
        $this->Bonus_stat = ["def" => 5];
        $this->prix_eqp = 26;
        $this->picture = 'img/Bouclier.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}

?>