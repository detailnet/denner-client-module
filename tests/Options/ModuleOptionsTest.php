<?php

namespace DennerTest\Client\Options;

use Denner\Client\Options\ModuleOptions;

class ModuleOptionsTest extends OptionsTestCase
{
    /**
     * @var ModuleOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            ModuleOptions::CLASS,
            []
        );
    }

    public function testOptionsExist(): void
    {
        $this->assertInstanceOf(ModuleOptions::CLASS, $this->options);
    }
}
