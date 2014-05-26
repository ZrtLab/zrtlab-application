<?php

namespace Zrt\Tests;

use PHPUnit_Framework_TestCase,
    Zrt_Application;

class ApplicationTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
    }

    public function testInitializerInstance()
    {
        $instance = new Zrt_Application();
        $this->assetNotNull($instance);
    }

}
