<?php

namespace Denner\Client\Service;

use Denner\Client\AdvertisingClient as Client;

trait AdvertisingClientAwareTrait
{
    /**
     * @var Client
     */
    protected $advertisingClient;

    /**
     * @return Client
     */
    public function getAdvertisingClient()
    {
        return $this->advertisingClient;
    }

    /**
     * @param Client $advertisingClient
     */
    public function setAdvertisingClient(Client $advertisingClient)
    {
        $this->advertisingClient = $advertisingClient;
    }
}
