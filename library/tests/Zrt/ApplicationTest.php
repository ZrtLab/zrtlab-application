<?php

namespace Zrt\Tests;

use PHPUnit_Framework_TestCase,
    Zrt_Application;

class ApplicationTest extends PHPUnit_Framework_TestCase
{
    protected $inis = array();

    public function setUp()
    {
        $this->inis[] = $_SERVER['config_path'] . "/application.ini";
    }

    public function testInitializerInstance()
    {
        $instance = new Zrt_Application(ENVIRONMENT,$this->inis);
        $this->assertNotNull($instance);
    }

}
