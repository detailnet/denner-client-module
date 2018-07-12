<?php

namespace Denner\Client\Service;

use Denner\Client\AdvertisingClient as Client;

trait AdvertisingClientAwareTrait
{
    /**
     * @var Client|null
     */
    private $advertisingClient;

    public function getAdvertisingClient(): ?Client
    {
        return $this->advertisingClient;
    }

    public function setAdvertisingClient(Client $advertisingClient): void
    {
        $this->advertisingClient = $advertisingClient;
    }
}
