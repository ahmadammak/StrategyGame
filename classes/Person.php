<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:19 AM
 */
class Person
{
    private $id;
    private $money;
    private $health;
    private $moral;
    private $jobs;

    function __construct($id = null, $money = null, $health = null, $moral = null, array $jobs = [])
    {
        if($id === null){
            global $settings;
            // TODO: get next id from models
//            $this->id = getNextID();
            $this->money = 0.0;
            $this->health = $settings['DEFAULT_HEALTH'];
            $this->moral = $settings['DEFAULT_MORAL'];
            $this->jobs[] = new Unemployed();
        }
        else{
            $this->id = $id;
            $this->moral = $moral;
            $this->health = $health;
            $this->jobs = $jobs;
            $this->money = $money;
        }
    }

}