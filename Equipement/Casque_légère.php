<?php 


require_once('./Equipement/Equipement.php');

class Casque_légère extends Equipement
{
    public function __construct()
    {
           $this->Durabilité = 16  ;
           $this->nom_eqp= 'Casque_lourd' ;
           $this->level_requis = 1 ;
           $this->classe_requises = 8 ;
           $this->stat_requises = ["force" => 10, "agilité" => 5];
           $this->Bonus_stat = 4 ;
           $this->prix_eqp = 30 ;
           $this->picture = 'img/LineageMonster.giant_spider_0_0.1.png'; 
    
    }

}