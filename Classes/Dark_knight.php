<?php

require_once('./Classes/Ennemi.php');

class Dark_knight extends Ennemi
{
    public function __construct()
    {
           $this->pv = 10 ;
           $this->nom= 'Chevalier Noir' ;
           $this->puissance = 15 ;
           $this->constitution = 15 ;
           $this->Vitesse = 5 ;
           $this->xp = 20 ;
           $this->gold = 12 ;
    }

    public function runaway()
    {
        
    }
}