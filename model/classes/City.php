<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:19 AM
 */
use Doctrine\Common\Collections\ArrayCollection;
class City
{
    protected $id;
    protected $usr_id;
    protected $people;
    protected $money;
    protected $houses;
    protected $city_tax;
    protected $income_tax;
    protected $job_opo;
    protected $noh;
    protected $nop;
    protected $ills;
    protected $new_person_tick;

    function __construct($usr_id)
    {
        global $settings;
        $this->usr_id = $usr_id;
        $this->city_tax = $settings['CITY_TAX'];
        $this->houses = 0;
        $this->ills = new ArrayCollection();
        $this->income_tax = $settings['INCOME_TAX'];
        $this->job_opo = 0;
        $this->money = $settings['DEFAULT_CITY_MONEY'];
        $this->noh = 0;
        $this->nop = 0;
        $this->people = new ArrayCollection();
        $this->new_person_tick = 0;

    }

    /**
     * @param mixed $usr_id
     */
    public function setUsrId($usr_id)
    {
        $this->usr_id = $usr_id;
    }

    /**
     * @param int $new_person_tick
     */
    public function setNewPersonTick($new_person_tick)
    {
        $this->new_person_tick = $new_person_tick;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsrId()
    {
        return $this->usr_id;
    }

    /**
     * @return int
     */
    public function getNewPersonTick()
    {
        return $this->new_person_tick;
    }

    /**
     * @return array
     */
    public function getIlls()
    {
        return $this->ills;
    }

    /**
     * @param array $ills
     */
    public function setIlls($ills)
    {
        $this->ills = $ills;
    }
    public function addToIll($person)
    {
        $this->ills[] = $person;
    }
    /**
     * @return null
     */
    public function getNop()
    {
        return $this->nop;
    }

    /**
     * @param null $nop
     */
    public function setNop($nop)
    {
        $this->nop = $nop;
    }

    /**
     * @return null
     */
    public function getNoh()
    {
        return $this->noh;
    }

    /**
     * @param null $noh
     */
    public function setNoh($noh)
    {
        $this->noh = $noh;
    }

    /**
     * @return null
     */
    public function getJobOpo()
    {
        return $this->job_opo;
    }

    /**
     * @param null $job_opo
     */
    public function setJobOpo($job_opo)
    {
        $this->job_opo = $job_opo;
    }
    /**
     * @return null
     */
    public function getIncomeTax()
    {
        return $this->income_tax;
    }

    /**
     * @param null $income_tax
     */
    public function setIncomeTax($income_tax)
    {
        $this->income_tax = $income_tax;
    }

    /**
     * @return null
     */
    public function getCityTax()
    {
        return $this->city_tax;
    }

    /**
     * @param null $city_tax
     */
    public function setCityTax($city_tax)
    {
        $this->city_tax = $city_tax;
    }

    /**
     * @return null
     */
    public function getHouses()
    {
        return $this->houses;
    }

    /**
     * @param null $houses
     */
    public function setHouses($houses)
    {
        $this->houses = $houses;
    }

    /**
     * @return null
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param null $money
     */
    public function setMoney($money)
    {
        $this->money = $money;
    }

    /**
     * @return array
     */
    public function getPeople()
    {
        return $this->people;
    }

    /**
     * @param array $people
     */
    public function setPeople($people)
    {
        $this->people = $people;
    }
    public function addPerson()
    {
        $this->people[] = new Person($this);
    }
    public function doNextTick()
    {
        // TODO:
    }

}