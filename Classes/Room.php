<?php

class Room {
    private string $name;
    private string $description;
    private string $type;
    private int $donjon_id;
    private int $or;
    private int $pv;
    public string $picture;


    public function __construct($room)
    {
        $this->name = $room['name'];
        $this->description = $room['description'];
        $this->type = $room['type'];
        $this->donjon_id = $room['donjon_id'];
        $this->picture= $room['picture']? $room['picture'] : "";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function getHTML(): string{

        $html = "";

        switch ($this->type) {
            case 'vide':
                $html .= "<p class='mt-4'><a href='donjons_play.php?id=". $this->donjon_id ."' class='btn btn-green'>Continue exploring</a></p>";
                break;

            case 'treasure':
                $or = rand(1, 20);
                $_SESSION['perso']['gold'] += $or;

                $html .= "<p class='mt-4'>You have won " . $or . " gold coin</p>";
                $html .= "<p class='mt-4'><a href='donjons_play.php?id=". $this->donjon_id ."' class='btn btn-green'>Continue exploring</a></p>";
                break;
            
            case 'camp':
                $pv = rand(2, 5);
                if ($_SESSION['perso']['pv'] < 30 ) {
                    $_SESSION['perso']['pv'] += $pv;
                    $html .= "<p class='mt-4'>You recover " . $pv . " life point</p>";
                } else {
                    $html .= "<p class='mt-4'>You do not recover life points but you have a good time with your companions</p>";
                }
                $html .= "<p class='mt-4'><a href='donjons_play.php?id=". $this->donjon_id ."' class='btn btn-green'>Continue exploring</a></p>";
                break;

            case 'combat':
                $html .= "<p class='mt-4'><a href='donjon_fight.php?id=". $this->donjon_id ."' class='btn btn-green'>Fight</a></p>";
                $html .= "<p class='mt-4'><a href='donjons_play.php?id=". $this->donjon_id ."' class='btn btn-green'>Run away and continue exploring</a></p>";
                break;


            default:
                $html .= "<p>No action possible!</p>";
                break;
        }

        return $html;

    }

    public function getAction(): void
    {

        switch ($this->type) {
            case 'vide':
                break;

            case 'treasure':
                $this -> or = rand(0, 20);
                $_SESSION['perso']['gold'] += $this -> or;
                break;
            
            case 'camp':
                $this ->pv = rand(2, 5);
                if ($_SESSION['perso']['pv'] < 30 ) {
                    $_SESSION['perso']['pv'] += $this -> pv;
                }
                break;
            
            case 'combat':
                break;
            
            default:
                break;
        }
    }


}