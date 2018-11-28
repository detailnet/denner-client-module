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
    protected $appId;

    /**
     * @var string|null
     */
    protected $appKey;

    /**
     * @var array
     */
    protected $httpOptions = [];

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
        return $this->getBaseUri();
    }

    /**
     * @param string $baseUrl
     * @deprecated Use {@see setBaseUri()} instead
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->setBaseUri($baseUrl);
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

    public function getHttpOptions(): array
    {
        return $this->httpOptions;
    }

    public function setHttpOptions(array $options): void
    {
        $this->httpOptions = $options;
    }

    /**
     * @return array
     * @deprecated Use {@see getHttpOptions()} instead
     */
    public function getDefaults(): array
    {
        return $this->getHttpOptions();
    }

    /**
     * @param array $options
     * @deprecated Use {@see setHttpOptions()} instead
     */
    public function setDefaults(array $options): void
    {
        $this->setHttpOptions($options);
    }
}
