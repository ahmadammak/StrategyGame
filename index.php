<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:14 AM
 */
require "bootstrap.php";
$city = City::getCity(1);
echo $city->getId();
echo "\n";
$person = Person::getPerson(2);
echo $person->getId();
echo $person->getMoral();
echo $person->getHealth();
//Worker::convertToWorker($person->getId());
$w = Worker::getWorker(1);
var_dump(is_null($w));
echo $w->getExperiencePoints();
$w->setExperiencePoints(213.2);