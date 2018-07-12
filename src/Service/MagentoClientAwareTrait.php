<?php

namespace Denner\Client\Service;

use Denner\Client\MagentoClient as Client;

trait MagentoClientAwareTrait
{
    /**
     * @var Client|null
     */
    private $magentoClient;

    public function getMagentoClient(): ?Client
    {
        return $this->magentoClient;
    }

    public function setMagentoClient(Client $magentoClient): void
    {
        $this->magentoClient = $magentoClient;
    }
}
