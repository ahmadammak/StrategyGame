<?php
$command = $argv[1];
if ($command === "nexttick"){
    require_once "bootstrap.php";
    $allcitiesid = CityController::getAllCitiesIds();
    foreach($allcitiesid as $ctyId)
    {
        $city = new CityController($ctyId);
        $city->doNextTick();
        if(UserController::isOnline($city->getUserId()))
        {
            // TODO: send ajax response
        }
    }
}