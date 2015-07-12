<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/6/15
 * Time: 10:21 AM
 */
class Worker extends Model implements JobI
{
    protected $experience_points;
    protected $experience_tick;
    protected $prs_id;

    /**
     * @return int
     */
    public function getExperiencePoints()
    {
        return $this->experience_points;
    }

    /**
     * @return int
     */
    public function getExperienceTick()
    {
        return $this->experience_tick;
    }

    /**
     * @return mixed
     */
    public function getPrsId()
    {
        return $this->prs_id;
    }

    protected function __construct()
    {
        global $settings;
        $this->experience_tick = 0;
        $this->experience_points = 0;
    }

    /**
     * @param int $experience_points
     */
    public function setExperiencePoints($experience_points)
    {
        Worker::init();
        $statment = Worker::$conn->prepare("update Workers set exp_points = :exp_points where prs_id = :prs_id");
        $statment->bindParam(':exp_points', $experience_points);
        $statment->bindParam(':prs_id', $this->getPrsId());
        $statment->execute();
        $this->experience_points = $experience_points;
    }

    /**
     * @param int $experience_tick
     */
    public function setExperienceTick($experience_tick)
    {
        Worker::init();
        $statment = Worker::$conn->prepare("update Workers set exp_tick = :exp_tick where prs_id = :prs_id");
        $statment->bindParam(':exp_tick', $experience_tick);
        $statment->bindParam(':prs_id', $this->getPrsId());
        $statment->execute();
        $this->experience_tick = $experience_tick;
    }
    public static function convertToWorker($prs_id)
    {
        $worker = new Worker();
        Worker::init();
        // TODO: add inserted person id
        $statment = Worker::$conn->prepare("insert into Workers values (:prs_id, :exp_tick, :exp_points)");
        $statment->bindParam(':prs_id', $prs_id);
        $statment->bindParam(':exp_tick', $worker->getExperienceTick());
        $statment->bindParam(':exp_points', $worker->getExperiencePoints());
        $statment->execute();
        return $worker;

    }
    public static function getWorker($prs_id)
    {
        Worker::init();
        $statment = Worker::$conn->prepare("select * from Workers where prs_id = :prs_id");
        $statment->bindParam(':prs_id', $prs_id);
        $statment->execute();
        if($statment->rowCount() === 1){
            $row = $statment->fetch();
            $worker = new Worker();
            $worker->prs_id = ($row['prs_id']);
            $worker->experience_points = ($row['exp_points']);
            $worker->experience_tick = ($row['exp_tick']);
            return $worker;
        }
        return null;
    }

    /**
     * @param mixed $prs_id
     */
    public function setPrsId($prs_id)
    {
        $this->prs_id = $prs_id;
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
        global $settings;
        if($this->getExperienceTick()-1 === $settings['EXP_POINT_INCR'])
        {
            $this->setExperiencePoints($this->getExperiencePoints()+1);
            $this->setExperienceTick(0);
        }
        else{
            $this->setExperienceTick($this->getExperienceTick()+1);
        }
    }

}