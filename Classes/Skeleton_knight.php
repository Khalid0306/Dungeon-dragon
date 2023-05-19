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


    public function dialogSkeletonKnight()
    {
        $randomNum = random_int(1, 10);

        if ($randomNum <= 4) {
            echo "Vbnhskn nvdknbk jnhd! (Rise and face your demise!)";
        } else if ($randomNum <= 6) {
            echo "Ydbsvn dkbvsj, hndbkn! (Your flesh will feed my sword!)";
        } else if ($randomNum <= 8) {
            echo "Sjbvndk jdbvh, nvhdsn! (There is no escape from death!)";
        } else {
            echo "Knjvbsn nvjhbv, dnbsvj! (Your bones will join the eternal dance!)";
        }
    }

    public function run_away(){
        $ennemi = ($_SESSION['fight']['ennemi']);
        $flee = random_int(1, 10);
    
        if ($flee <= 5) {
            echo "The Goblin successfully flees from the battle!";
            unset($ennemi);
        } else {
            echo "The Goblin fails to escape and remains in the battle!";
        }
    }
}