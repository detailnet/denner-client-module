<?php

namespace Denner\Client\Factory\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Denner\Client\Exception\ConfigException;
use Denner\Client\Options\ModuleOptions;

class ModuleOptionsFactory implements
    FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['denner_client'])) {
            throw new ConfigException('Config for Denner\Client is not set');
        }

        return new ModuleOptions($config['denner_client']);
    }
}
