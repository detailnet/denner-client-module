<?php

namespace Denner\Client\Factory\Client;

use ReflectionClass;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Factory\AbstractFactoryInterface;

use Denner\Client\DennerClient;
use Denner\Client\Exception;
use Denner\Client\Options\Client\ClientOptions;
use Denner\Client\Options\ModuleOptions;

class ClientFactory implements
    AbstractFactoryInterface
{
    /**
     * Cache of canCreate lookups.
     *
     * @var array
     */
    private $lookupCache = [];

    /**
     * Can the factory create an instance for the service?
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @return bool
     */
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        if (array_key_exists($requestedName, $this->lookupCache)) {
            return $this->lookupCache[$requestedName];
        }

        $clientExists = $this->clientExists($requestedName);

        $this->lookupCache[$requestedName] = $clientExists;

        return $clientExists;
    }

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DennerClient
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $clientOptions = $this->getClientOptions($container, $requestedName);

        if (!$this->clientExists($requestedName)) {
            throw new Exception\ConfigException(
                sprintf('Client "%s" does not exist', $requestedName)
            );
        }

        /** @var DennerClient $requestedName */

        $appliedClientOptions = [];

        // Only pass along options which are actually set
        if ($clientOptions !== null) {
            $appliedClientOptions = array_filter(
                $clientOptions->toArray(),
                function ($value) {
                    return $value !== null;
                }
            );
        }

        $client = $requestedName::factory($appliedClientOptions);

        return $client;
    }

    /**
     * @param string $clientClass
     * @return boolean
     */
    private function clientExists($clientClass)
    {
        // Class name must start with "Denner\Client"
        if (strpos($clientClass, 'Denner\Client') !== 0) {
            return false;
        }

        if (!class_exists($clientClass)) {
            return false;
        }

        $reflectionClass = new ReflectionClass($clientClass);

        return $reflectionClass->isSubclassOf(DennerClient::CLASS);
    }

    /**
     * @param ContainerInterface $container
     * @param string $clientName
     * @return ClientOptions
     */
    private function getClientOptions(ContainerInterface $container, $clientName)
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $container->get(ModuleOptions::CLASS);
        $clientOptions = $moduleOptions->getClient($clientName);

        return $clientOptions;
    }
}
