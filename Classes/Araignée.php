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


    public function dialogSpider()
    {
        $randomNum = random_int(1, 10);

        if ($randomNum <= 4) {
            echo "Hsbnvd jhbdnjvbd hvsn! (Caught in my web of doom!)";
        } else if ($randomNum <= 6) {
            echo "Kjbsnvds dksvn jnvbsd! (Struggle all you want, you are trapped!)";
        } else if ($randomNum <= 8) {
            echo "Vbsjhdn jdvbn jndsjv! (Savor the venom coursing through your veins!)";
        } else {
            echo "Jnvdnjksn jnhsbvd, dnjvhsb! (You will make a delightful feast!)";
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