<?php

namespace App\Game_classes;

use App\Game_classes\Creature;

class Alien extends Creature
{
    public $eyes = 4;
    public $heads = 2;
    public $legs = 2;
    public $hands = 4;

    public $swim = 4;
    public $run = 2;
    public $walk = -1;

    public $touch = 5;
    public $sight = 4;
    public $taste = 1;
    public $smell = 1;
    public $hearing = 1;
}