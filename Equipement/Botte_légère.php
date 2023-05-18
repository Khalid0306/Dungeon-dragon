<?php 


require_once('./Equipement/Equipement.php');

class Botte_légère extends Equipement {
    public function __construct() {
        $this->Durabilité = 17;
        $this->nom_eqp= 'Botte_légère';
        $this->level_requis = 1;
        $this->classe_requises = ["Mage", "Thief", "Healer"];
        $this->stat_requises = ["vit" => 7];
        $this->Bonus_stat = ["vit" => 3, "dex" => 2];
        $this->prix_eqp = 21;
        $this->picture = 'img/Botte_légère.png';
        $this->equiper = false;
        $this->quantité = 1;
    }
}

?>