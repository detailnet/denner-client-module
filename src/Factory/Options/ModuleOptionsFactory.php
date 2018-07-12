<?php

namespace Denner\Client\Factory\Options;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Factory\FactoryInterface;

use Denner\Client\Exception\ConfigException;
use Denner\Client\Options\ModuleOptions;

class ModuleOptionsFactory implements
    FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return ModuleOptions
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');

        if (!isset($config['denner_client'])) {
            throw new ConfigException('Config for Denner\Client is not set');
        }

        return new ModuleOptions($config['denner_client']);
    }
}
