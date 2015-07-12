<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:19 AM
 */
class City extends Model
{
    protected $id;
    protected $usr_id;
    protected $people;
    protected $money;
    protected $houses;
    protected $city_tax;
    protected $income_tax;
    protected $job_opo;
    protected $noh;
    protected $nop;
    protected $ills;
    protected $new_person_tick;

    protected function __construct()
    {
        global $settings;
        $this->usr_id = 0;
        $this->city_tax = $settings['CITY_TAX'];
        $this->houses = 0;
        $this->ills = [];
        $this->income_tax = $settings['INCOME_TAX'];
        $this->job_opo = 0;
        $this->money = $settings['DEFAULT_CITY_MONEY'];
        $this->noh = 0;
        $this->nop = 0;
        $this->people = [];
        $this->new_person_tick = 0;

    }
    public static function createCity($usr_id)
    {
        $city = new City();
        City::init();
        $statment = City::$conn->prepare("insert into Cities (usr_id,cty_money,cty_houses,cty_jobs,new_person_tick,noh,nop) values (:usr_id,:cty_money,:cty_houses,:cty_jobs,:new_person_tick,:noh,:nop)");
        $statment->bindParam(':usr_id', $usr_id);
        $statment->bindParam(':cty_money', $city->getMoney());
        $statment->bindParam(':cty_houses', $city->getHouses());
        $statment->bindParam(':cty_jobs', $city->getJobOpo());
        $statment->bindParam(':new_person_tick', $city->getNewPersonTick());
        $statment->bindParam(':noh', $city->getNoh());
        $statment->bindParam(':nop', $city->getNop());
        $statment->execute();


        // TODO: get inserted city id
        $city->setId(mysql_insert_id());
        return $city;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public static function getCity($cty_id)
    {
        City::init();
        // TODO: add current user checking
        $statment = City::$conn->prepare("select * from Cities where cty_id = :cty_id");
        $statment->bindParam(':cty_id', $cty_id);
        $statment->execute();
        if($statment->rowCount() === 1){
            $row = $statment->fetch();
            $city = new City();
            $city->usr_id = ($row['usr_id']);
            $city->money = ($row['cty_money']);
            $city->houses = ($row['cty_houses']);
            $city->job_opo = ($row['cty_jobs']);
            $city->new_person_tick = ($row['new_person_tick']);
            $city->noh = ($row['noh']);
            $city->nop = ($row['nop']);
            $city->getAllPeople();
            $city->getIllPeople();
            $city->id = $row['cty_id'];
            return $city;
        }
        return null;

    }
    public function getAllPeople()
    {
        $this->people = [];
        $statment = User::$conn->prepare("select prs_id from People where cty_id = :cty_id");
        $statment->bindParam(':cty_id', $this->getId());
        $statment->execute();
        $allrows = $statment->fetchAll();
        foreach($allrows as $row){;
            $this->people[] = $row[0];
        }
    }
    protected function getIllPeople()
    {
        $statment = User::$conn->prepare("select prs_id from Ills where cty_id = :cty_id");
        $statment->bindParam(':cty_id', $this->getId());
        $statment->execute();
        $allrows = $statment->fetchAll();
        foreach($allrows as $row){;
            $this->ills[] = $row[0];
        }
    }
    protected function addIllPerson($prs_id)
    {
        City::init();
        $statment = City::$conn->prepare("insert into Ills (cty_id, prs_id) values (:cty_id, :prs_id)");
        $statment->bindParam(':cty_id', $this->getId());
        $statment->bindParam(':prs_id', $prs_id);
        $statment->execute();
    }
    /**
     * @param mixed $usr_id
     */
    public function setUsrId($usr_id)
    {
        City::init();
        $statment = City::$conn->prepare("update Cities set usr_id = :usr_id where cty_id = :cty_id");
        $statment->bindParam(':usr_id', $usr_id);
        $statment->bindParam(':cty_id', $this->getId());
        $statment->execute();
        $this->usr_id = $usr_id;
    }

    /**
     * @param int $new_person_tick
     */
    public function setNewPersonTick($new_person_tick)
    {
        City::init();
        $statment = City::$conn->prepare("update Cities set new_person_tick = :new_person_tick where cty_id = :cty_id");
        $statment->bindParam(':new_person_tick', $new_person_tick);
        $statment->bindParam(':cty_id', $this->getId());
        $statment->execute();
        $this->new_person_tick = $new_person_tick;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsrId()
    {
        return $this->usr_id;
    }

    /**
     * @return int
     */
    public function getNewPersonTick()
    {
        return $this->new_person_tick;
    }

    /**
     * @return array
     */
    public function getIlls()
    {
        return $this->ills;
    }

    /**
     * @return null
     */
    public function getNop()
    {
        return $this->nop;
    }

    /**
     * @param null $nop
     */
    public function setNop($nop)
    {
        $this->nop = $nop;
    }

    /**
     * @return null
     */
    public function getNoh()
    {
        return $this->noh;
    }

    /**
     * @param null $noh
     */
    public function setNoh($noh)
    {
        $this->noh = $noh;
    }

    /**
     * @return null
     */
    public function getJobOpo()
    {
        return $this->job_opo;
    }

    /**
     * @param null $job_opo
     */
    public function setJobOpo($job_opo)
    {

        City::init();
        $statment = City::$conn->prepare("update Cities set cty_jobs = :cty_jobs where cty_id = :cty_id");
        $statment->bindParam(':cty_jobs', $job_opo);
        $statment->bindParam(':cty_id', $this->getId());
        $statment->execute();
        $this->job_opo = $job_opo;
    }
    /**
     * @return null
     */
    public function getIncomeTax()
    {
        return $this->income_tax;
    }

    /**
     * @param null $income_tax
     */
    public function setIncomeTax($income_tax)
    {
        $this->income_tax = $income_tax;
    }

    /**
     * @return null
     */
    public function getCityTax()
    {
        return $this->city_tax;
    }

    /**
     * @param null $city_tax
     */
    public function setCityTax($city_tax)
    {
        $this->city_tax = $city_tax;
    }

    /**
     * @return null
     */
    public function getHouses()
    {
        return $this->houses;
    }

    /**
     * @param null $houses
     */
    public function setHouses($houses)
    {
        City::init();
        $statment = City::$conn->prepare("update Cities set cty_houses = :cty_houses where cty_id = :cty_id");
        $statment->bindParam(':cty_houses', $houses);
        $statment->bindParam(':cty_id', $this->getId());
        $statment->execute();
        $this->houses = $houses;
    }

    /**
     * @return null
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param null $money
     */
    public function setMoney($money)
    {
        City::init();
        $statment = City::$conn->prepare("update Cities set cty_money = :cty_money where cty_id = :cty_id");
        $statment->bindParam(':cty_money', $money);
        $statment->bindParam(':cty_id', $this->getId());
        $statment->execute();
        $this->money = $money;
    }

    /**
     * @return array
     */
    public function getPeople()
    {
        return $this->people;
    }

    public function doNextTick()
    {
        // TODO:
    }

}