<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:21 AM
 */
class Worker implements JobI
{
    private $experience_points;
    private $frequency;
    private $experience_frequecny;

    function __construct()
    {
        global $settings;
        $this->experience_frequecny = $settings['EXP_POINT_INCR'];
        $this->frequency = $settings['SALARY_FREQUENCY'];
        $this->experience_points = 0;
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