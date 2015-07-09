<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:21 AM
 */
class Unemployed implements JobI
{
    private $default_salary;

    function __construct()
    {
        global $settings;
        $this->default_salary = $settings['DEFAULT_SALARY'];
    }

    public function getIncomeSource()
    {
        // TODO: Implement getIncomeSource() method.
    }

    public function getSalary()
    {
        // TODO: Implement getSalary() method.
    }

}