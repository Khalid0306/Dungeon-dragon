<?php 


require_once('./Equipement/Equipement.php');


class Gantelet_leger extends Equipement {
    public function __construct() {
        $this->Durabilité = 19;
        $this->nom_eqp= 'Gantelet leger';
        $this->level_requis = 1;
        $this->classe_requises = ["Healer", "Mage","Thief","Archer"];
        $this->stat_requises = ["mana" => 8];
        $this->Bonus_stat = ["mana" => 2, "vit" => 3];
        $this->prix_eqp = 82;
        $this->picture = 'img/gantelet_leger.png';
        $this->equiper = false;
        $this->quantité = 1;
        $this->id_eqp = 7;
    }
}

?>