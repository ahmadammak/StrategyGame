<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:11 AM
 */
$settings = parse_ini_file("settings.conf");
require_once "vendor/autoload.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\PersistentCollection;
spl_autoload_register(function($classname){
    $classes = "model/classes/".$classname.".php";
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

$isDevMode = true;
$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/model/classes/mapping"), $isDevMode);
$conn = array(
    'driver' => $settings['DRIVER'],
    'password' => $settings['PASSWD'],
    'dbname' => $settings['DB_NAME'],
    'user' => $settings['USER']
);

$entityManager = EntityManager::create($conn, $config);

$users = $entityManager->getRepository("User");
$me = $users->find(4);
/*echo gettype($me);
echo "\n";
echo $me->getUsrName();
echo "\n";
echo $me->getUsrPass();
echo "\n";
echo $me->getIsOnline();
echo "\n";
echo $me->getCities()->count();
echo "\n";*/
$me->addCity(new City($me));
$entityManager->flush();
/*//$me->getCities()->get(0)->addPerson();
var_dump(is_null($me->getCities()->get(0)->getPeople()));//->getPeople()[0]->getId();
//echo gettype($me->getCities()->get(0)->getPeople());
echo $me->getCities()->get(0)->getPeople()->get(0);
//$entityManager->flush();
//$c = new PersistentCollection();*/

