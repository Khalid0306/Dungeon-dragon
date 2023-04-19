<?php 

require_once('./Classes/Ennemi.php');

class Gobelin extends Ennemi
{
    public function __construct()
    {
           $this->pv = 3 ;
           $this->nom= 'Gobelin' ;
           $this->puissance = 10 ;
           $this->constitution = 8 ;
           $this->Vitesse = 7 ;
           $this->xp = 4 ;
    }

    public function runaway()
    {

    }
}