<?php 


require_once('./Equipement/Equipement.php');

class Arc extends Equipement {
    public function __construct() {
        $this->Durabilité = 17;
        $this->nom_eqp= 'Arc';
        $this->level_requis = 1;
        $this->classe_requises = ["Archer"];
        $this->stat_requises = ["vit" => 12];
        $this->Bonus_stat = ["vit" => 3, "dex" => 2];
        $this->prix_eqp = 71;
        $this->picture = 'img/Arc.png';
        $this->equiper = false;
        $this->quantité = 1;
    }

}

?>