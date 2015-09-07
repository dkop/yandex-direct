<?php

namespace Biplane\YandexDirect\Api\V5\Contract;

/**
 * Auto-generated code.
 */
class BidSetItem
{

    protected $CampaignId = null;

    protected $AdGroupId = null;

    protected $KeywordId = null;

    protected $Bid = null;

    protected $ContextBid = null;

    protected $StrategyPriority = null;

    /**
     * Creates a new instance of BidSetItem.
     *
     * @return BidSetItem
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Gets CampaignId.
     *
     * @return int|null
     */
    public function getCampaignId()
    {
        return $this->CampaignId;
    }

    /**
     * Sets CampaignId.
     *
     * @param int|null $value
     * @return $this
     */
    public function setCampaignId($value = null)
    {
        $this->CampaignId = $value;

        return $this;
    }

    /**
     * Gets AdGroupId.
     *
     * @return int|null
     */
    public function getAdGroupId()
    {
        return $this->AdGroupId;
    }

    /**
     * Sets AdGroupId.
     *
     * @param int|null $value
     * @return $this
     */
    public function setAdGroupId($value = null)
    {
        $this->AdGroupId = $value;

        return $this;
    }

    /**
     * Gets KeywordId.
     *
     * @return int|null
     */
    public function getKeywordId()
    {
        return $this->KeywordId;
    }

    /**
     * Sets KeywordId.
     *
     * @param int|null $value
     * @return $this
     */
    public function setKeywordId($value = null)
    {
        $this->KeywordId = $value;

        return $this;
    }

    /**
     * Gets Bid.
     *
     * @return int|null
     */
    public function getBid()
    {
        return $this->Bid;
    }

    /**
     * Sets Bid.
     *
     * @param int|null $value
     * @return $this
     */
    public function setBid($value = null)
    {
        $this->Bid = $value;

        return $this;
    }

    /**
     * Gets ContextBid.
     *
     * @return int|null
     */
    public function getContextBid()
    {
        return $this->ContextBid;
    }

    /**
     * Sets ContextBid.
     *
     * @param int|null $value
     * @return $this
     */
    public function setContextBid($value = null)
    {
        $this->ContextBid = $value;

        return $this;
    }

    /**
     * Gets StrategyPriority.
     *
     * @return PriorityEnum|null
     */
    public function getStrategyPriority()
    {
        return $this->StrategyPriority;
    }

    /**
     * Sets StrategyPriority.
     *
     * @param PriorityEnum|null $value
     * @return $this
     */
    public function setStrategyPriority(PriorityEnum $value = null)
    {
        $this->StrategyPriority = $value;

        return $this;
    }


}

