<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:21 AM
 */
class Unemployed implements JobI
{
    private $frequency;
    private $default_salary;

    function __construct()
    {
        global $settings;
        $this->default_salary = $settings['DEFAULT_SALARY'];
        $this->frequency = $settings['SALARY_FREQUENCY'];
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