<?php 


require_once('./Equipement/Equipement.php');

class Armure_légère extends Equipement {
    public function __construct() {
        $this->Durabilité = 18;
        $this->nom_eqp= 'Armure légère';
        $this->level_requis = 1;
        $this->classe_requises = ["Mage", "Thief", "Healer"];
        $this->stat_requises = ["def" => 8, "vit" => 6];
        $this->Bonus_stat = ["def" => 3, "vit" => 2, "dex" => 1];
        $this->prix_eqp = 103;
        $this->picture = 'img/armure_légère.png';
        $this->equiper = false;
        $this->quantité = 1;
    }

}

?>







