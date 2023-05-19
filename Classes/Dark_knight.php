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
    

    public function dialogDarkKnight()
    {
        $randomNum = random_int(1, 10);
    
        if ($randomNum <= 4) {
            echo "Sjvbnvd dhjhsn nvdk! (Witness the darkness's power!)";
        } else if ($randomNum <= 6) {
            echo "Ynvbk dnjkhs, b@hskn! (You are no match for my blade!)";
        } else if ($randomNum <= 8) {
            echo "Jnvbks hvbkdjkn knvhs! (Feel the chill of despair!)";
        } else {
            echo "Ksjbnjv dknbksn hvsnjd! (Your fate is sealed, fool!)";
        }
    }

    public function run_away(){

        $flee = random_int(1, 10);
    
        if ($flee <= 5) {
            echo "The Goblin successfully flees from the battle!";
            unset($_SESSION['fight']['ennemi']);
        } else {
            echo "The Goblin fails to escape and remains in the battle!";
        }
    }
}