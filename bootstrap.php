<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:11 AM
 */
$settings = parse_ini_file("settings.conf");
require_once "vendor/autoload.php";
spl_autoload_register(function($classname){
    $classes = "classes/".$classname.".php";
    $controllers = $classname.".php";
    $views =  "view/".$classname.".php";
    $models = "model/".$classname.".php";

    if(file_exists($classes)){
        require_once $classes;
    }
    if(file_exists($controllers)){
        require_once $controllers;
    }
    if(file_exists($views)){
        require_once $views;
    }
    if(file_exists($models)){
        require_once $models;
    }
});
