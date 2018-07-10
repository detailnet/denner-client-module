<?php

namespace Denner\Client\Service;

use Denner\Client\MagentoClient as Client;

trait MagentoClientAwareTrait
{
    /**
     * @var Client
     */
    protected $magentoClient;

    /**
     * @return Client
     */
    public function getMagentoClient()
    {
        return $this->magentoClient;
    }

    /**
     * @param Client $magentoClient
     */
    public function setMagentoClient(Client $magentoClient)
    {
        $this->magentoClient = $magentoClient;
    }
}
