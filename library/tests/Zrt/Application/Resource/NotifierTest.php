<?php

namespace Zrt\Tests\Application\Resource;

use PHPUnit_Framework_TestCase,
    Zrt_Application,
    Zrt_Application_Bootstrap_Bootstrap,
    Zend_Controller_Front;

class NotifierTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $filesConfig = array(
           $_SERVER["config_path"] . "/application.ini"
        );

        $this->application = new Zrt_Application(ENVIRONMENT,$filesConfig);
        $this->bootstrap = new Zrt_Application_Bootstrap_Bootstrap($this->application);
        Zend_Controller_Front::getInstance()->resetInstance();
    }

    public function testConfig()
    {
        $this->assertNotNull($this->application->getOptions());
    }
}
