<?php

namespace Denner\Client\Service;

use Denner\Client\AppraisalClient as Client;

trait AppraisalClientAwareTrait
{
    /**
     * @var Client|null
     */
    private $appraisalClient;

    public function getAppraisalClient(): ?Client
    {
        return $this->appraisalClient;
    }

    public function setAppraisalClient(Client $appraisalClient): void
    {
        $this->appraisalClient = $appraisalClient;
    }
}
