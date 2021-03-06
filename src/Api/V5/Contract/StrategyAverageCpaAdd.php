<?php

namespace Biplane\YandexDirect\Api\V5\Contract;

/**
 * Auto-generated code.
 */
class StrategyAverageCpaAdd
{

    protected $AverageCpa = null;

    protected $GoalId = null;

    protected $WeeklySpendLimit = null;

    protected $BidCeiling = null;

    /**
     * Creates a new instance of StrategyAverageCpaAdd.
     *
     * @return self
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Gets AverageCpa.
     *
     * @return int
     */
    public function getAverageCpa()
    {
        return $this->AverageCpa;
    }

    /**
     * Sets AverageCpa.
     *
     * @param int $value
     * @return self
     */
    public function setAverageCpa($value)
    {
        $this->AverageCpa = $value;

        return $this;
    }

    /**
     * Gets GoalId.
     *
     * @return int
     */
    public function getGoalId()
    {
        return $this->GoalId;
    }

    /**
     * Sets GoalId.
     *
     * @param int $value
     * @return self
     */
    public function setGoalId($value)
    {
        $this->GoalId = $value;

        return $this;
    }

    /**
     * Gets WeeklySpendLimit.
     *
     * @return int|null
     */
    public function getWeeklySpendLimit()
    {
        return $this->WeeklySpendLimit;
    }

    /**
     * Sets WeeklySpendLimit.
     *
     * @param int|null $value
     * @return self
     */
    public function setWeeklySpendLimit($value = null)
    {
        $this->WeeklySpendLimit = $value;

        return $this;
    }

    /**
     * Gets BidCeiling.
     *
     * @return int|null
     */
    public function getBidCeiling()
    {
        return $this->BidCeiling;
    }

    /**
     * Sets BidCeiling.
     *
     * @param int|null $value
     * @return self
     */
    public function setBidCeiling($value = null)
    {
        $this->BidCeiling = $value;

        return $this;
    }


}

