<?php

namespace Denner\Client\Service;

use Denner\Client\TranslationsClient as Client;

trait TranslationsClientAwareTrait
{
    /**
     * @var Client|null
     */
    private $translationsClient;

    public function getTranslationsClient(): ?Client
    {
        return $this->translationsClient;
    }

    public function setTranslationsClient(Client $translationsClient): void
    {
        $this->translationsClient = $translationsClient;
    }
}
