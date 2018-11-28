<?php

namespace DennerTest\Client\Options\Client;

use Denner\Client\Options\Client\ClientOptions;
use DennerTest\Client\Options\OptionsTestCase;

class ClientOptionsTest extends OptionsTestCase
{
    public function testBaseUriCanBeSet(): void
    {
        $uri = 'https://some.url';

        $options = new ClientOptions(['base_uri' => $uri]);

        $this->assertEquals($uri, $options->getBaseUri());
    }

    public function testBaseUrlIsStillSupported(): void
    {
        $uri = 'https://some.url';

        $options = new ClientOptions(['base_url' => $uri]);

        $this->assertEquals($uri, $options->getBaseUri());
        $this->assertEquals($uri, $options->getBaseUrl());
    }

    public function testAppIdCanBeSet(): void
    {
        $id = 'some-app-id';

        $options = new ClientOptions(['app_id' => $id]);

        $this->assertEquals($id, $options->getAppId());
    }

    public function testAppKeyCanBeSet(): void
    {
        $id = 'some-app-key';

        $options = new ClientOptions(['app_key' => $id]);

        $this->assertEquals($id, $options->getAppKey());
    }

    public function testHttpOptionsCanBeSet(): void
    {
        $http = ['timeout' => 30];

        $options = new ClientOptions(['http_options' => $http]);

        $this->assertEquals($http, $options->getHttpOptions());
    }

    public function testDefaultsAreStillSupported(): void
    {
        $http = ['timeout' => 30];

        $options = new ClientOptions(['defaults' => $http]);

        $this->assertEquals($http, $options->getHttpOptions());
        $this->assertEquals($http, $options->getDefaults());
    }
}
