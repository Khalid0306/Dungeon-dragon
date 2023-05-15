<?php 

require_once('./Classes/Ennemi.php');

class Araignée extends Ennemi
{
    public function __construct()
    {
           $this->pv = 9 ;
           $this->nom= 'Araignée' ;
           $this->puissance = 8 ;
           $this->constitution = 8 ;
           $this->Vitesse = 8 ;
           $this->xp = 4 ;
           $this->gold = 8 ;
           $this->picture = 'img/LineageMonster.giant_spider_0_0.1.png'; 
    
    }


    public function runaway()
    {

    }
}