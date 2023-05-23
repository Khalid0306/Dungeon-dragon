<?php 


require_once('./Equipement/Equipement.php');

class Potion_de_vie extends Equipement {
    public function __construct() {
        $this->Durabilité = 1;
        $this->nom_eqp= 'Potion de vie';
        $this->level_requis = 1;
        $this->classe_requises = ["Mage", "Thief", "Healer", "Warrior", "Tank","Archer"];
        $this->stat_requises = ["mana" => 0];
        $this->Bonus_stat = ["pv" => 7];
        $this->prix_eqp = 15;
        $this->picture = 'img/Potion_de_vie.png';
        $this->equiper = false;
        $this->quantité = 1;
        $this->id_eqp = 1;
    }
}

?>

