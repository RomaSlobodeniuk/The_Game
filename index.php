<?php

spl_autoload_register(function ($class) {
    $file_name = str_replace('\\', '/', $class) . '.php';
    if (file_exists($file_name)) {
        require_once($file_name);
    } else {
        echo "file is not exist";
    }
});

$human = new \App\Game_classes\Human();
$alien = new \App\Game_classes\Alien();

function competition($distances_arr)
{

} // end this method;

competition($human->getDistanceArray());