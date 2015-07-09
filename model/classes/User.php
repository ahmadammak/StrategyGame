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
    protected $usr_pass;
    protected $is_online;
    protected $usr_name;
    protected $cities;

    function __construct($usr_name, $usr_pass)
    {
        $this->cities = new ArrayCollection();
        $this->usr_name = $usr_name;
        $this->usr_pass = $usr_pass;
        $this->is_online = 0;
    }

    /**
     * @return mixed
     */
    public function getUsrId()
    {
        return $this->usr_id;
    }
    public function addCity(City $city)
    {
        $this->cities[] = $city;
    }

    /**
     * @return mixed
     */
    public function getUsrPass()
    {
        return $this->usr_pass;
    }

    /**
     * @param mixed $usr_pass
     */
    public function setUsrPass($usr_pass)
    {
        $this->usr_pass = $usr_pass;
    }

    /**
     * @return mixed
     */
    public function getIsOnline()
    {
        return $this->is_online;
    }

    /**
     * @param mixed $is_online
     */
    public function setIsOnline($is_online)
    {
        $this->is_online = $is_online;
    }

    /**
     * @return mixed
     */
    public function getUsrName()
    {
        return $this->usr_name;
    }

    /**
     * @param mixed $usr_name
     */
    public function setUsrName($usr_name)
    {
        $this->usr_name = $usr_name;
    }

    /**
     * @return ArrayCollection
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @param ArrayCollection $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
    }


}