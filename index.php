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


//echo '<hr><br>Human skills in:<br>';
//echo 'Swimming --> ' . $human->swimming() . '<br>';
//echo 'Running --> ' . $human->running() . '<br>';
//echo 'Walking --> ' . $human->walking() . '<br><br><hr>';
//
//echo '<hr><br>Alien skills in:<br>';
//echo 'Swimming --> ' . $alien->swimming() . '<br>';
//echo 'Running --> ' . $alien->running() . '<br>';
//echo 'Walking --> ' . $alien->walking() . '<br><br><hr>';