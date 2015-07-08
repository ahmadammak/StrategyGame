<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:19 AM
 */
use Doctrine\Common\Collections\ArrayCollection;
class Person
{
    protected $id;
    protected $money;
    protected $health;
    protected $moral;
    protected $worker;
    protected $soldier;
    protected $cty_id;
    protected $salary_tick;
    protected $health_tick;

    function __construct($id = null, $money = null, $health = null, $moral = null, array $jobs = [])
    {
        if($id === null){
            global $settings;
            // TODO: get next id from models
//            $this->id = getNextID();
            $this->money = 0.0;
            $this->health = $settings['DEFAULT_HEALTH'];
            $this->moral = $settings['DEFAULT_MORAL'];
            $this->salary_tick = $settings['SALARY_FREQUENCY'];
            $this->health_tick = $settings['HOSPITAL_RECOVERY_SPEED'];
            $this->worker = null;
            $this->soldier = null;
        }
        else{
            $this->id = $id;
            $this->moral = $moral;
            $this->health = $health;
            $this->jobs = $jobs;
            $this->money = $money;
        }
    }

    /**
     * @return mixed
     */
    public function getCityId()
    {
        return $this->city_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMoney()
    {
        return $this->money;
    }

    public function addMoney($amount)
    {
        $this->money += $amount;
    }

    /**
     * @return null
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @return null
     */
    public function getMoral()
    {
        return $this->moral;
    }

    /**
     * @return array
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    public function addJob(JobI $newjob)
    {
        $this->jobs[] = $newjob;
    }

}