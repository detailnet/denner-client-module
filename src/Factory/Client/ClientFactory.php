<?php

namespace Denner\Client\Factory\Client;

use ReflectionClass;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

use Denner\Client\DennerClient;
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
            throw new ServiceNotCreatedException(
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

        // The client expects "base_uri", but we work with "base_url" (to remain backwards compatibility)
        if (!isset($appliedClientOptions['base_uri']) && isset($appliedClientOptions['base_url'])) {
            $appliedClientOptions['base_uri'] = $appliedClientOptions['base_url'];
        }

        $client = $requestedName::factory($appliedClientOptions);

        return $client;
    }

    private function clientExists(string $clientClass): bool
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

    private function getClientOptions(ContainerInterface $container, string $clientName): ClientOptions
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $container->get(ModuleOptions::CLASS);
        $clientOptions = $moduleOptions->getClient($clientName);

        return $clientOptions;
    }
}
