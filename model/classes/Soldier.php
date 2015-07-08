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

    function __construct($prs_id = null, $fights_num = null)
    {
        global $settings;
        $this->frequency = $settings['SALARY_FREQUENCY'];
        if($fights_num != null)
            $this->prs_id = $prs_id;
        if($prs_id != null)
            $this->fights_num = $fights_num;
    }

    public function getFightsNumber()
    {
        return $this->fights_num;
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