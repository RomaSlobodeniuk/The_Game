<?php

namespace App\Game_classes;

use App\Game_classes\Creature;

class Alien extends Creature
{
    public $eyes = 3;
    public $heads = 1;
    public $legs = 4;
    public $hands = 3;

    public $swim = 1;
    public $run = 5;
    public $walk = 2;

    public $touch = 3;
    public $sight = 2;
    public $taste = 1;
    public $smell = 2;
    public $hearing = 3;

    public function setClassName(){
        $arr = explode('\\', __CLASS__);
        $this->class_name = $arr[2];
    }
}