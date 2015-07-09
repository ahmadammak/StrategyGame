<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:21 AM
 */
class Worker implements JobI
{
    protected $experience_points;
    protected $experience_tick;
    protected $prs_id;

    function __construct($prs_id)
    {
        global $settings;
        $this->prs_id = $prs_id;
        $this->experience_tick = 0;
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

    public function doNextTick()
    {
        // TODO:
    }

}