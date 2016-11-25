<?php

namespace App\Game_classes;

use App\Game_classes\Creature;

class Human extends Creature
{
    public $eyes = 2;
    public $heads = 1;
    public $legs = 2;
    public $hands = 2;

    public $swim = 2;
    public $run = 3;
    public $walk = 2;

    public $touch = 3;
    public $sight = 2;
    public $taste = 4;
    public $smell = 3;
    public $hearing = 2;
}