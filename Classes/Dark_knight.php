<?php

require_once('./Classes/Ennemi.php');

class Dark_knight extends Ennemi
{
    public function __construct()
    {
           $this->pv = 15 ;
           $this->nom= 'Chevalier Noir' ;
           $this->puissance = 10 ;
           $this->constitution = 10 ;
           $this->Vitesse = 8 ;
           $this->xp = 8 ;
           $this->gold = 12 ;
           $this->picture = 'img/Knight_Dark_Souls_III_Armor_Swords_Shield_Gray_536509_1080x1920-removebg-preview.png'; 
    }
    

    public function runaway()
    {
        
    }
}