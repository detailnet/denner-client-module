<?php

namespace Denner\Client\Factory\Client;

use ReflectionClass;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Exception\ServiceNotFoundException;
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
            throw new ServiceNotFoundException(
                sprintf('Client "%s" does not exist', $requestedName)
            );
        }

        /** @var DennerClient $requestedName */

        $options = array_merge(
            $clientOptions->getHttpOptions(),
            // Only pass along options which are actually set
            array_filter(
                [
                    'base_uri' => $clientOptions->getBaseUri(),
                    DennerClient::OPTION_APP_ID => $clientOptions->getAppId(),
                    DennerClient::OPTION_APP_KEY => $clientOptions->getAppKey(),
                ],
                function ($value) {
                    return $value !== null;
                }
            )
        );

        return $requestedName::factory($options);
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
