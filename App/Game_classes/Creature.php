<?php

namespace App\Game_classes;
use App\Game_interfaces\BodyParts;
use App\Game_interfaces\Events;
use App\Game_interfaces\Feels;

class Creature implements BodyParts, Events, Feels
{
    public function __construct()
    {
        $this->setDistances();
        $this->setClassName();
        $this->setDefaultSpeed();
        $this->setDistances();
        echo 'The time values of the paths of different distances of ' . $this->class_name . ' are:';
        $this->showArr($this->showPassingTime());
        echo 'The total time of the passing all the distance is: ' . $this->calculateTotalDistanceTime() . '<br>';
        echo '<br>';
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

    public $swimming_time;
    public $running_time;
    public $walking_time;

    public $distance_for_swimming = 50;
    public $distance_for_running = 20;
    public $distance_for_walking = 50;

    public $class_name;
    public $standard_speed_array = [];
    public $distance_array = [];

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

    public function swimming($amount_of_the_distance_units = 1){
        return $this->swimming_time = $amount_of_the_distance_units * ($this->standard_speed_array[self::SWIM] * $this->actionSwimmingModifier());
    }
    public function running($amount_of_the_distance_units = 1){
        return $this->running_time = $amount_of_the_distance_units * ($this->standard_speed_array[self::RUN] * $this->actionRunningModifier());
    }
    public function walking($amount_of_the_distance_units = 1){
        return $this->walking_time = $amount_of_the_distance_units * ($this->standard_speed_array[self::WALK] * $this->actionWalkingModifier());
    }
    
    public function showPassingTime(){
        $times_values_array =[];
        foreach ([self::WALK.'ing', self::RUN.'ning', self::SWIM.'ming'] as $item) {
            $times_values_array[$item] = $this->$item();
        }
        return $times_values_array;
    }

    public function actionSwimmingModifier(){
        return ($this->legs() * self::BUFF_LEG_SEA) *
                ($this->hands() * self::BUFF_HAND_SEA) *
                ($this->sight() * self::BUFF_SIGHT_SEA) *
                ($this->taste() * self::BUFF_TASTE_SEA);
    }
    public function actionRunningModifier(){
        return ($this->eyes() * self::BUFF_EYE_LANDSCAPE) * ($this->hands() * self::BUFF_HAND_LANDSCAPE) * ($this->sight() * self::BUFF_SIGHT_LANDSCAPE);
    }
    public function actionWalkingModifier(){
        return ($this->heads() * self::BUFF_HEAD_FOREST) * ($this->hands() * self::BUFF_HAND_FOREST) * ($this->touch() * self::BUFF_TOUCH_FOREST) * ($this->hearing() * self::BUFF_HEARING_FOREST) * ($this->smell() * self::BUFF_SMELL_FOREST);
    }

    public function setDefaultSpeed(){
        foreach ([self::SWIM, self::RUN, self::WALK] as $movement_kind){
            $this->standard_speed_array[$movement_kind] = self::DISTANCE_UNIT / $this->$movement_kind;
        }
        return $this->standard_speed_array;
    }

    public function getDefaultSpeedArray(){
        return $this->distance_array;
    }

    public function setDistances(){
        foreach ([self::WALK.'ing', self::RUN.'ning', self::SWIM.'ming'] as $item) {
            $kind_action = 'distance_for_' . $item;
            $this->distance_array[$item] = $this->$kind_action;
        }
        return $this->distance_array;
    }

    public function getDistanceArray(){
        return $this->distance_array;
    }

    public function calculateTotalDistanceTime(){
        return  array_sum($this->showPassingTime());
    }

    public function showArr($arr){
        echo '<hr><br><pre>';
        print_r($arr);
        echo '<br><hr></pre>';
    }
}