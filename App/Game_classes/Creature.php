<?php

namespace App\Game_classes;
use App\Game_interfaces\BodyParts;
use App\Game_interfaces\Events;
use App\Game_interfaces\Feels;

class Creature implements BodyParts, Events, Feels
{
    public $eyes;
    public $heads;
    public $legs;
    public $hands;

    public $swim;
    public $run;
    public $walk;

    public $touch;
    public $sight;
    public $taste;
    public $smell;
    public $hearing;

    public function eyes(){
        return $this->eyes;
    }
    public function heads(){
        return $this->heads;
    }
    public function legs(){
        return $this->legs;
    }
    public function hands(){
        return $this->hands;
    }

    public function swimming(){
        return ($this->eyes - $this->hands + $this->legs - $this->hands) + $this->swim;
    }
    public function running(){
        return ($this->eyes + $this->hands + $this->legs + $this->hands) + $this->run;
    }
    public function walking(){
        return ($this->eyes + $this->hands + $this->legs + $this->hands) + $this->walk;
    }

    public function touch(){
        return $this->touch;
    }
    public function sight(){
        return $this->sight;
    }
    public function taste(){
        return $this->taste;
    }
    public function smell(){
        return $this->smell;
    }
    public function hearing(){
        return $this->hearing;
    }
}