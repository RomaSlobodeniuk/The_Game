<?php

namespace App\Game_interfaces;

interface Events
{
    public function swimming($args);
    public function running($args);
    public function walking($args);
}