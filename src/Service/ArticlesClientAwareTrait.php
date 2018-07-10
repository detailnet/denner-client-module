<?php

namespace Denner\Client\Service;

use Denner\Client\ArticlesClient as Client;

trait ArticlesClientAwareTrait
{
    /**
     * @var Client
     */
    protected $articlesClient;

    /**
     * @return Client
     */
    public function getArticlesClient()
    {
        return $this->articlesClient;
    }

    /**
     * @param Client $articlesClient
     */
    public function setArticlesClient(Client $articlesClient)
    {
        $this->articlesClient = $articlesClient;
    }
}
