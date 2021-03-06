<?php

namespace Biplane\YandexDirect\Api\V5\Contract;

/**
 * Auto-generated code.
 */
class TextCampaignUpdateItem extends TextCampaignBase
{

    protected $BiddingStrategy = null;

    protected $Settings = null;

    /**
     * Creates a new instance of TextCampaignUpdateItem.
     *
     * @return self
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Gets BiddingStrategy.
     *
     * @return TextCampaignStrategy|null
     */
    public function getBiddingStrategy()
    {
        return $this->BiddingStrategy;
    }

    /**
     * Sets BiddingStrategy.
     *
     * @param TextCampaignStrategy|null $value
     * @return self
     */
    public function setBiddingStrategy(TextCampaignStrategy $value = null)
    {
        $this->BiddingStrategy = $value;

        return $this;
    }

    /**
     * Gets Settings.
     *
     * @return TextCampaignSetting[]|null
     */
    public function getSettings()
    {
        return $this->Settings;
    }

    /**
     * Sets Settings.
     *
     * @param TextCampaignSetting[]|null $value
     * @return self
     */
    public function setSettings(array $value = null)
    {
        $this->Settings = $value;

        return $this;
    }


}

