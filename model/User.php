<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/8/15
 * Time: 4:59 PM
 */
class User extends Model
{
    protected $usr_id;
    protected $usr_pass;
    protected $is_online;
    protected $usr_name;
    protected $cities_ids;

    protected function __construct($usr_id, $usr_name, $usr_pass)
    {
        parent::init();
        $this->usr_id = $usr_id;
        $this->usr_name = $usr_name;
        $this->usr_pass = $usr_pass;
        $this->is_online = 0;
        $this->cities_ids = [];
    }
    public static function getUserById($usr_id)
    {
        User::init();
        $statment = User::$conn->prepare("select * from Users where usr_id = :usr_id");
        $statment->bindParam(':usr_id', $usr_id);
        $statment->execute();
        if($statment->rowCount() === 1){
            $row = $statment->fetch();
            $user = new User($row['usr_id'], $row['usr_name'], $row['usr_pass']);
            $user->getAllCitiesIds();
            return $user;
        }
        else {
            return null;
        }
    }
    public static function getAllUsersIds()
    {
        User::init();
        $statment = User::$conn->prepare("select usr_id from Users");
        $statment->execute();
        $allrows = $statment->fetchAll();
        $arr = [];
        foreach($allrows as $row){;
            $arr[] = $row[0];
        }
        return $arr;

    }
    public static function getUser($usr_name, $usr_pass)
    {
        User::init();
        $statment = User::$conn->prepare("select usr_id from Users where usr_name = :usr_name and usr_pass = :usr_pass");
        $statment->bindParam(':usr_name', $usr_name);
        $statment->bindParam(':usr_pass', $usr_pass);
        $statment->execute();
        if($statment->rowCount() === 1){
            $row = $statment->fetch();
            $user = new User($row['usr_id'], $usr_name, $usr_pass);
            $user->getAllCitiesIds();
            return $user;
        }
        else {
            return null;
        }
    }
    public static function isUserNameExists($usrname)
    {
        User::init();
        $statment = User::$conn->prepare("select usr_id from Users where usr_name = :usr_name");
        $statment->bindParam(':usr_name', $usrname);
        $statment->execute();
        if($statment->rowCount() === 1) {
            return 1;
        }
        return 0;
    }
    public static function createUser($usr_name,$usr_pass)
    {
        parent::init();
        $statment = parent::$conn->prepare("insert into Users (usr_name, usr_pass) values (:usr_name , :usr_pass)");
        $statment->bindParam(':usr_name', $usr_name);
        $statment->bindParam(':usr_pass', $usr_pass);
        $statment->execute();
        if($statment->rowCount() === 1){
            $user = User::getUser($usr_name, $usr_pass);
            return $user;
        }
        else {
            return null;
        }
    }
    protected function getAllCitiesIds()
    {
        $statment = User::$conn->prepare("select cty_id from Cities where usr_id = :usr_id");
        $statment->bindParam(':usr_id', $this->getUsrId());
        $statment->execute();
        $allrows = $statment->fetchAll();
        foreach($allrows as $row){;
            $this->cities_ids[] = $row[0];
        }

    }

    /**
     * @return mixed
     */
    public function getUsrId()
    {
        return $this->usr_id;
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
        User::init();
        $statment = User::$conn->prepare("update Users set usr_pass = :usr_pass where usr_id = :usr_id");
        $statment->bindParam(':usr_id', $this->getUsrId());
        $statment->bindParam(':usr_pass', $usr_pass);
        $statment->execute();
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
        User::init();
        $statment = User::$conn->prepare("update Users set is_online = :is_online where usr_id = :usr_id");
        $statment->bindParam(':usr_id', $this->getUsrId());
        $statment->bindParam(':is_online', $is_online);
        $statment->execute();
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
     * @return ArrayCollection
     */
    public function getCitiesIds()
    {
        return $this->cities_ids;
    }



}