<?php

require_once('./Classes/Ennemi.php');

class Dark_knight extends Ennemi
{
    public function __construct()
    {
           $this->pv = 17 ;
           $this->nom= 'Chevalier Noir' ;
           $this->puissance = 12 ;
           $this->constitution = 12 ;
           $this->Vitesse = 8 ;
           $this->xp = 20 ;
           $this->gold = 12 ;
           $this->picture = 'img/Knight_Dark_Souls_III_Armor_Swords_Shield_Gray_536509_1080x1920-removebg-preview.png'; 
    }
    

    public function runaway()
    {
        
    }
}