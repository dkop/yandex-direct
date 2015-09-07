<?php

namespace Biplane\YandexDirect\Api\V5\Contract;

/**
 * Auto-generated code.
 */
class GetAdResponse extends GetResponseGeneral
{

    protected $Ads = null;

    /**
     * Creates a new instance of GetAdResponse.
     *
     * @return GetAdResponse
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Gets Ads.
     *
     * @return AdGetItem[]|null
     */
    public function getAds()
    {
        return $this->Ads;
    }

    /**
     * Sets Ads.
     *
     * @param AdGetItem[]|null $value
     * @return $this
     */
    public function setAds(array $value = null)
    {
        $this->Ads = $value;

        return $this;
    }


}

