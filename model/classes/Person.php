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

    function __construct($cty_id)
    {
        global $settings;
        $this->money = 0.0;
        $this->health = $settings['DEFAULT_HEALTH'];
        $this->moral = $settings['DEFAULT_MORAL'];
        $this->salary_tick = $settings['SALARY_FREQUENCY'];
        $this->health_tick = $settings['HOSPITAL_RECOVERY_SPEED'];
        $this->worker = null;
        $this->soldier = null;
        $this->cty_id = $cty_id;
    }

    /**
     * @return mixed
     */
    public function getCityId()
    {
        return $this->cty_id;
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

    public function addHealth($amount)
    {
        $this->health += $amount;
    }

    /**
     * @return null
     */
    public function getMoral()
    {
        return $this->moral;
    }

    public function decreaseMoral($amount)
    {
        $this->moral -= $amount;
    }

    public function setWorker()
    {
        $this->worker = new Worker($this->getId());
    }
    public function setSoldier($fights_num = null)
    {
        $this->soldier = new Soldier($this->id, $fights_num);
    }

    /**
     * @return null
     */
    public function getWorker()
    {
        return $this->worker;
    }
    public function isWorker()
    {
        return $this->worker !== null;
    }
    public function isSoldier()
    {
        return $this->soldier !== null;
    }

    /**
     * @return null
     */
    public function getSoldier()
    {
        return $this->soldier;
    }

    /**
     * @return mixed
     */
    public function getCtyId()
    {
        return $this->cty_id;
    }

    /**
     * @return mixed
     */
    public function getSalaryTick()
    {
        return $this->salary_tick;
    }

    /**
     * @return mixed
     */
    public function getHealthTick()
    {
        return $this->health_tick;
    }

    public function doNextTick()
    {
        // TODO:
    }

}