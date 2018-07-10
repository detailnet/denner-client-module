<?php

namespace DennerTest\Client;

use PHPUnit\Framework\TestCase;

use Denner\Client\Module;

class ModuleTest extends TestCase
{
    /**
     * @var Module
     */
    protected $module;

    protected function setUp()
    {
        $this->module = new Module();
    }

    public function testModuleProvidesConfig(): void
    {
        $config = $this->module->getConfig();

        $this->assertTrue(is_array($config));
        $this->assertArrayHasKey('denner_client', $config);
        $this->assertTrue(is_array($config['denner_client']));
    }
}
