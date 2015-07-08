<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/8/15
 * Time: 4:59 PM
 */
use Doctrine\Common\Collections\ArrayCollection;
class User
{
    protected $usr_id;
    protected $cities;

    function __construct()
    {
        $this->cities = new ArrayCollection();
    }
    public function addCity(City $city)
    {
        $this->cities[] = $city;
    }

}