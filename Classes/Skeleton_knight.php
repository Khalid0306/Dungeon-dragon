<?php 

require_once('./Classes/Ennemi.php');

class Skeleton_knight extends Ennemi
{
    public function __construct()
    {
           $this->pv = 8 ;
           $this->nom= 'Skeleton_knight' ;
           $this->puissance = 5 ;
           $this->constitution = 6 ;
           $this->Vitesse = 7 ;
           $this->xp = 2 ;
           $this->gold = 6 ;
           $this->picture = 'img/skeleton_knight_concept_by_robinspitzer_dexsufv-fullview-removebg-preview.png'; 
    
    }


    public function runaway()
    {

    }
}