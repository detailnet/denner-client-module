<?php

namespace Denner\Client\Service;

use Denner\Client\ArticlesClient as Client;

trait ArticlesClientAwareTrait
{
    /**
     * @var Client|null
     */
    private $articlesClient;

    public function getArticlesClient(): ?Client
    {
        return $this->articlesClient;
    }

    public function setArticlesClient(Client $articlesClient): void
    {
        $this->articlesClient = $articlesClient;
    }
}
