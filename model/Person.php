<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:19 AM
 */
class Person extends Model
{
    protected $id;
    protected $money;
    protected $health;
    protected $moral;
    protected $cty_id;
    protected $salary_tick;
    protected $health_tick;

    protected function __construct()
    {
        global $settings;
        $this->money = 0.0;
        $this->health = $settings['DEFAULT_HEALTH'];
        $this->moral = $settings['DEFAULT_MORAL'];
        $this->salary_tick = $settings['SALARY_FREQUENCY'];
        $this->health_tick = $settings['HOSPITAL_RECOVERY_SPEED'];
        $this->worker = null;
        $this->soldier = null;
    }
    public static function getPerson($prs_id)
    {
        Person::init();
        $statment = Person::$conn->prepare("select * from People where prs_id = :prs_id");
        $statment->bindParam(':prs_id', $prs_id);
        $statment->execute();
        if($statment->rowCount() === 1){
            $row = $statment->fetch();
            $prs = new Person();
            $prs->id = ($row['prs_id']);
            $prs->cty_id = ($row['cty_id']);
            $prs->health  =($row['prs_health']);
            $prs->moral = ($row['prs_moral']);
            $prs->health_tick = ($row['prs_health_tick']);
            $prs->salary_tick = ($row['prs_salary_tick']);
            $prs->money = ($row['prs_money']);
            return $prs;
        }
        return null;
    }
    public static function createPerson($cty_id)
    {
        $prs = new Person();
        Person::init();
        // TODO: add inserted person id
        $statment = Person::$conn->prepare("insert into People (cty_id, prs_health, prs_moral, prs_health_tick, prs_salary_tick, prs_money) values (:cty_id, :prs_health, :prs_moral, :prs_health_tick, :prs_salary_tick, :prs_money)");
        $statment->bindParam(':cty_id', $cty_id);
        $statment->bindParam(':prs_health', $prs->getHealth());
        $statment->bindParam(':prs_moral', $prs->getMoral());
        $statment->bindParam(':prs_health_tick', $prs->getHealthTick());
        $statment->bindParam(':prs_salary_tick', $prs->getSalaryTick());
        $statment->bindParam(':prs_money', $prs->getMoney());
        $statment->execute();
        return $prs;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param float $money
     */
    public function setMoney($money)
    {
        Person::init();
        $statment = Person::$conn->prepare("update People set prs_money = :prs_money where prs_id = :prs_id");
        $statment->bindParam(':prs_money', $money);
        $statment->bindParam(':prs_id', $this->getId());
        $statment->execute();
        $this->money = $money;
    }

    /**
     * @param mixed $health
     */
    public function setHealth($health)
    {

        Person::init();
        $statment = Person::$conn->prepare("update People set prs_health = :prs_health where prs_id = :prs_id");
        $statment->bindParam(':prs_health', $health);
        $statment->bindParam(':prs_id', $this->getId());
        $statment->execute();
        $this->health = $health;
    }

    /**
     * @param mixed $moral
     */
    public function setMoral($moral)
    {
        Person::init();
        $statment = Person::$conn->prepare("update People set prs_moral = :prs_moral where prs_id = :prs_id");
        $statment->bindParam(':prs_moral', $moral);
        $statment->bindParam(':prs_id', $this->getId());
        $statment->execute();
        $this->moral = $moral;
    }

    /**
     * @param mixed $cty_id
     */
    public function setCtyId($cty_id)
    {
        $this->cty_id = $cty_id;
    }

    /**
     * @param mixed $salary_tick
     */
    public function setSalaryTick($salary_tick)
    {

        Person::init();
        $statment = Person::$conn->prepare("update People set prs_salary_tick = :prs_salary_tick where prs_id = :prs_id");
        $statment->bindParam(':prs_salary_tick', $salary_tick);
        $statment->bindParam(':prs_id', $this->getId());
        $statment->execute();
        $this->salary_tick = $salary_tick;
    }

    /**
     * @param mixed $health_tick
     */
    public function setHealthTick($health_tick)
    {

        Person::init();
        $statment = Person::$conn->prepare("update People set prs_health_tick = :prs_health_tick where prs_id = :prs_id");
        $statment->bindParam(':prs_health_tick', $health_tick);
        $statment->bindParam(':prs_id', $this->getId());
        $statment->execute();
        $this->health_tick = $health_tick;
    }


    /**
     * @return mixed
     */
    public function getCityId()
    {
        return $this->cty_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMoney()
    {
        return $this->money;
    }

    public function addMoney($amount)
    {

        Person::init();
        $statment = Person::$conn->prepare("update People set prs_money = :prs_money where prs_id = :prs_id");
        $statment->bindParam(':prs_money', $this->getMoney()+$amount);
        $statment->bindParam(':prs_id', $this->getId());
        $statment->execute();
        $this->money += $amount;
    }

    /**
     * @return null
     */
    public function getHealth()
    {
        return $this->health;
    }

    public function addHealth($amount)
    {

        Person::init();
        $statment = Person::$conn->prepare("update People set prs_health = :prs_health where prs_id = :prs_id");
        $statment->bindParam(':prs_health', $this->getHealth()+$amount);
        $statment->bindParam(':prs_id', $this->getId());
        $statment->execute();
        $this->health += $amount;
    }

    /**
     * @return null
     */
    public function getMoral()
    {
        return $this->moral;
    }

    public function decreaseMoral($amount)
    {
        $this->moral -= $amount;
    }


    /**
     * @return mixed
     */
    public function getCtyId()
    {
        return $this->cty_id;
    }

    /**
     * @return mixed
     */
    public function getSalaryTick()
    {
        return $this->salary_tick;
    }

    /**
     * @return mixed
     */
    public function getHealthTick()
    {
        return $this->health_tick;
    }

    public function doNextTick()
    {
        // TODO:
    }

}