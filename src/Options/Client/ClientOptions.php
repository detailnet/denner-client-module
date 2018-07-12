<?php

namespace Denner\Client\Options\Client;

use Zend\Stdlib\AbstractOptions;

class ClientOptions extends AbstractOptions
{
    /**
     * @var string|null
     */
    protected $baseUri;

    /**
     * @var string|null
     */
    protected $baseUrl;

    /**
     * @var string|null
     */
    protected $appId;

    /**
     * @var string|null
     */
    protected $appKey;

    /**
     * @var array
     */
    protected $defaults = [];

    public function getBaseUri(): ?string
    {
        return $this->baseUri;
    }

    public function setBaseUri(string $baseUri): void
    {
        $this->baseUri = $baseUri;
    }

    /**
     * @return string
     * @deprecated Use {@see getBaseUri()} instead
     */
    public function getBaseUrl(): ?string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     * @deprecated Use {@see setBaseUri()} instead
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    public function getAppId(): ?string
    {
        return $this->appId;
    }

    public function setAppId(?string $appId): void
    {
        $this->appId = $appId;
    }

    public function getAppKey(): ?string
    {
        return $this->appKey;
    }

    public function setAppKey(?string $appKey): void
    {
        $this->appKey = $appKey;
    }

    public function getDefaults(): array
    {
        return $this->defaults;
    }

    public function setDefaults(array $defaults): void
    {
        $this->defaults = $defaults;
    }
}
