<?php

namespace Denner\Client\Service;

use Denner\Client\AssetsClient as Client;

trait AssetsClientAwareTrait
{
    /**
     * @var Client|null
     */
    private $assetsClient;

    public function getAssetsClient(): ?Client
    {
        return $this->assetsClient;
    }

    public function setAssetsClient(Client $assetsClient): void
    {
        $this->assetsClient = $assetsClient;
    }
}
