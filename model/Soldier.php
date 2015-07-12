<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:21 AM
 */
class Soldier extends Model implements JobI
{
    protected $fights_num;
    protected $prs_id;

    /**
     * @param mixed $prs_id
     */
    public function setPrsId($prs_id)
    {
        $this->prs_id = $prs_id;
    }

    function __construct()
    {
        global $settings;
        $this->fights_num = $settings['DEFAULT_FIGHTS_NUM'];
    }
    public static function convertToSoldier($prs_id)
    {
        Soldier::init();
        $soldier = new Soldier();
        $statment = Soldier::$conn->prepare("insert into Soldiers (prs_id, fights_num) values (:prs_id, :fights_num)");
        $statment->bindParam(':prs_id', $prs_id);
        $statment->bindParam(':fights_num', $soldier->getFightsNumber());
        $statment->execute();
        $soldier->setPrsId($prs_id);
        return $soldier;
    }
    public static function getSoldier($prs_id)
    {
        Soldier::init();
        $statment = Soldier::$conn->prepare("select * from Soldiers where prs_id = :prs_id");
        $statment->bindParam(':prs_id', $prs_id);
        $statment->execute();
        if($statment->rowCount() === 1){
            $row = $statment->fetch();
            $soldier = new Soldier();
            $soldier->prs_id = ($row['prs_id']);
            $soldier->fights_num = ($row['fights_num']);
            return $soldier;
        }
        return null;
    }
    /**
     * @param mixed $fights_num
     */
    public function setFightsNum($fights_num)
    {
        Soldier::init();
        $statment = Soldier::$conn->prepare("update Soldiers set fights_num = :fights_num where prs_id = :prs_id");
        $statment->bindParam(':fights_num', $fights_num);
        $statment->bindParam(':prs_id', $this->prs_id);
        $statment->execute();
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

    public function doNextTick()
    {
        // TODO:
    }

}