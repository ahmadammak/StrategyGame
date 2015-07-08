<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:21 AM
 */
class Soldier implements JobI
{
    protected $fights_num;
    protected $frequency;
    protected $prs_id;

    function __construct()
    {
        global $settings;
        $this->frequency = $settings['SALARY_FREQUENCY'];

    }

    public function getAttackPoints()
    {

    }

    public function getIncomeSource()
    {
        // TODO: Implement getIncomeSource() method.
    }

    public function getSalary()
    {
        // TODO: Implement getSalary() method.
    }

    public function getFrequency()
    {
        return $this->frequency;
    }

}