<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:19 AM
 */
class City
{
    private $id;
    private $people;
    private $money;
    private $houses;
    private $city_tax;
    private $income_tax;
    private $job_opo;
    private $noh;
    private $nop;
    private $ills;

    function __construct($id = null, array $people = null, $money = null, $houses = null, $city_tax = null, $income_tax = null, $job_opo = null, $noh = null, $nop = null, array $ills = null)
    {
        global $settings;
        if($id == null){
            // TODO: get id from model
//            $this->id = getNextId()
            $this->city_tax = $settings['CITY_TAX'];
            $this->houses = 0;
            $this->ills = [];
            $this->income_tax = $settings['INCOME_TAX'];
            $this->job_opo = 0;
            $this->money = $settings['DEFAULT_CITY_MONEY'];
            $this->noh = 0;
            $this->nop = 0;
            $this->people = [];
        }
        else{
            $this->id = $id;
            $this->city_tax = $city_tax;
            $this->houses = $houses;
            $this->ills = $ills;
            $this->income_tax = $income_tax;
            $this->job_opo = $job_opo;
            $this->money = $money;
            $this->noh = $noh;
            $this->nop = $nop;
            $this->people = $people;
        }

    }

}