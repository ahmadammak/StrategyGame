<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/8/15
 * Time: 5:35 PM
 */
class CityController
{
    protected $city;
    function __construct($cityId)
    {
        // TODO: Implement __construct() method.
    }
    public static function getAllCitiesIds()
    {

    }
    public function getUserId()
    {

    }

    public function getCityDashBoard()
    {
        // TODO: return array of current statistics of given city id (population, cash money, nop, noh, ...)
    }
    public function addNewPersonToCity()
    {
        // TODO: append new person to city people
    }
    public function addNewHospital()
    {
        // TODO: add new hospital
    }
    public function addNewJobOpo()
    {
        // TODO: add new job opportunity
    }
    public function getCityMoney()
    {
        // TODO: get total city money
    }
    public function recoverPersonUsingCity(Person $person)
    {
        // TODO: add person to hospital
    }
    public function getNumberOfWorkers()
    {
        // TODO:
    }
    public function getNumberOfSoldiers()
    {
        // TODO:
    }
    public function getWorkers()
    {
        // TODO: return list of workers
    }
    public function getSoldiers()
    {
        // TODO: return list of soldiers
    }
    public function giveSalariesToAllPeople()
    {
        // TODO:
    }
    public function takeTaxesFromPeople()
    {
        // TODO:
    }
    public function getNumberOfBuildings()
    {
        // TODO:
    }
    public function doNextTick()
    {

    }
}