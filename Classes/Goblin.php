<?php 

require_once('./Classes/Ennemi.php');

class Goblin extends Ennemi
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


    public function dialog_goblin()
    {
        $nb = random_int(1,10);

        if ($nb <= 4) {
            echo "G@bhsvy hbzdyy hsbdhb! (You are here to die, adventurer!)";
        } else if ($nb <= 6) {
            echo "Ysdff bd@fhf nebdhsh! (Prepare to face your doom!)";
        } else if ($nb <= 8) {
            echo "Fsdvn ybsjv d@khsb? (Do you think you can defeat me?)";
        } else {
            echo "Hbksjv, dhdbsv nbjks! (Cower in fear, weakling!)";
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