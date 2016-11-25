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
    public $run = 4;
    public $walk = 1;

    public $touch = 2;
    public $sight = 1;
    public $taste = 3;
    public $smell = 2;
    public $hearing = 4;
}