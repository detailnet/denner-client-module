<?php

namespace Denner\Client\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * @var Client\ClientOptions[]
     */
    protected $clients;

    /**
     * @param string $name
     * @return Client\ClientOptions
     */
    public function getClient($name)
    {
        return isset($this->clients[$name]) ? $this->clients[$name] : null;
    }

    /**
     * @return Client\ClientOptions[]
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @param array $clients
     */
    public function setClients(array $clients)
    {
        $this->clients = [];

        foreach ($clients as $name => $options) {
            $this->clients[$name] = new Client\ClientOptions($options);
        }
    }
}
