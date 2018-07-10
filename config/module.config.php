<?php

use Denner\Client;
use Denner\Client\Factory;

return [
    'service_manager' => [
        'abstract_factories' => [
            Client\Factory\Client\ClientFactory::CLASS,
        ],
        'factories' => [
            Client\Options\ModuleOptions::CLASS => Factory\Options\ModuleOptionsFactory::CLASS,
        ],
    ],
    'denner_client' => [
        'clients' => [],
    ],
];
