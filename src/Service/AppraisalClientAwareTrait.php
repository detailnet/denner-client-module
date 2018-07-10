<?php

namespace Denner\Client\Service;

use Denner\Client\AppraisalClient as Client;

trait AppraisalClientAwareTrait
{
    /**
     * @var Client
     */
    protected $appraisalClient;

    /**
     * @return Client
     */
    public function getAppraisalClient()
    {
        return $this->appraisalClient;
    }

    /**
     * @param Client $appraisalClient
     */
    public function setAppraisalClient(Client $appraisalClient)
    {
        $this->appraisalClient = $appraisalClient;
    }
}
