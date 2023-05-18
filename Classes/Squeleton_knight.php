<?php 

require_once('./Classes/Ennemi.php');

class Gobelin extends Ennemi
{
    public function __construct()
    {
           $this->pv = 8 ;
           $this->nom= 'Gobelin' ;
           $this->puissance = 5 ;
           $this->constitution = 6 ;
           $this->Vitesse = 7 ;
           $this->xp = 2 ;
           $this->gold = 6 ;
           $this->picture = 'img/goblin-removebg-preview.png'; 
    
    }


    public function runaway()
    {

    }
}