<?php

namespace DennerTest\Client\Factory\Client;

use Zend\ServiceManager\Factory\FactoryInterface;

use Denner\Client\AdvertisingClient;
use Denner\Client\Factory\Client\ClientFactory;
use Denner\Client\Options\Client\ClientOptions;
use Denner\Client\Options\ModuleOptions;
use DennerTest\Client\Factory\FactoryTestCase;

class ClientFactoryTest extends FactoryTestCase
{
    public function testFactoryCreatesClient(): void
    {
        $options = [
            'base_uri' => 'https://some.url',
            'app_id' => 'some-app-id',
            'app_key' => null,
            'http_options' => [
                'timeout' => 123,
                'verify' => false,
            ],
        ];

        $clientOptions = new ClientOptions($options);

        $moduleOptions = $this->prophesize(ModuleOptions::CLASS);
        $moduleOptions->getClient(AdvertisingClient::CLASS)->willReturn($clientOptions);

        $services = $this->getServices();
        $services->get(ModuleOptions::CLASS)->willReturn($moduleOptions->reveal());

        /** @var AdvertisingClient $client */
        $client = $this->getFactory()->__invoke($services->reveal(), AdvertisingClient::CLASS);
        $httpClient = $client->getHttpClient();

        $this->assertEquals($options['base_uri'], $client->getServiceUrl());
        $this->assertEquals($options['app_id'], $client->getServiceAppId());
        $this->assertNull($client->getServiceAppKey());
        $this->assertEquals($options['http_options']['timeout'], $httpClient->getConfig('timeout'));
        $this->assertEquals($options['http_options']['verify'], $httpClient->getConfig('verify'));
    }

    protected function createFactory(): FactoryInterface
    {
        return new ClientFactory();
    }
}
