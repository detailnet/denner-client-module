<?php

namespace Denner\Client\Service;

use Denner\Client\TranslationsClient as Client;

trait TranslationsClientAwareTrait
{
    /**
     * @var Client
     */
    protected $translationsClient;

    /**
     * @return Client
     */
    public function getTranslationsClient()
    {
        return $this->translationsClient;
    }

    /**
     * @param Client $translationsClient
     */
    public function setTranslationsClient(Client $translationsClient)
    {
        $this->translationsClient = $translationsClient;
    }
}
