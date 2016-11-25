<?php

namespace App\Game_classes;
use App\Game_interfaces\BodyParts;
use App\Game_interfaces\Events;
use App\Game_interfaces\Feels;

class Creature implements BodyParts, Events, Feels
{
    public function __construct()
    {
        $this->showArr($this->setDefaultSpeed());
//        echo $this->actionSwimmingModifier();
    }

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

    public $standard_speed_array = [];

    const DISTANCE_UNIT = 1; // 1 minute

    const SWIM = 'swim';
    const RUN = 'run';
    const WALK = 'walk';

    const BUFF_EYE_LANDSCAPE = 1.5;
    const BUFF_HEAD_FOREST = 0.75;
    const BUFF_LEG_SEA = 0.25;
    const BUFF_HAND_SEA = 0.33;
    const BUFF_HAND_LANDSCAPE = 0.33;
    const BUFF_HAND_FOREST = 0.5;
    const BUFF_TOUCH_FOREST = 0.33;
    const BUFF_SIGHT_SEA = 0.5;
    const BUFF_SIGHT_LANDSCAPE = 0.5;
    const BUFF_HEARING_FOREST = 1;
    const BUFF_TASTE_SEA = 0.4;
    const BUFF_SMELL_FOREST = 0.3;

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

    public function swimming(){
        return $this->standard_speed_array[self::SWIM];
    }
    public function running(){
        return ($this->eyes + $this->hands + $this->legs + $this->hands) + $this->run;
    }
    public function walking(){
        return ($this->eyes + $this->hands + $this->legs + $this->hands) + $this->walk;
    }

    public function actionSwimmingModifier(){
        return ($this->legs() * self::BUFF_LEG_SEA) * ($this->hands() * self::BUFF_HAND_SEA) * ($this->sight() * self::BUFF_SIGHT_SEA) * ($this->taste() * self::BUFF_TASTE_SEA);
    }
    public function actionRunningModifier(){
        return ($this->eyes() * self::BUFF_EYE_LANDSCAPE) * ($this->hands() * self::BUFF_HAND_LANDSCAPE) * ($this->sight() * self::BUFF_SIGHT_LANDSCAPE);
    }
    public function actionWalkingModifier(){
        return ($this->heads() * self::BUFF_HEAD_FOREST) * ($this->hands() * self::BUFF_HAND_FOREST) * ($this->touch() * self::BUFF_TOUCH_FOREST) * ($this->hearing() * self::BUFF_HEARING_FOREST) * ($this->smell() * self::BUFF_SMELL_FOREST);
    }

    public function setDefaultSpeed(){
        $tmp_array = array();
        foreach ([self::SWIM, self::RUN, self::WALK] as $movement_kind){
            $tmp_array[$movement_kind] = self::DISTANCE_UNIT / $this->$movement_kind;
        }
        return $this->standard_speed_array = $tmp_array;
    }

    public function showArr($arr){
        echo '<hr><br><pre>';
        print_r($arr);
        echo '<br><hr></pre>';
    }
}