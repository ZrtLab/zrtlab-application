<?php

namespace Zrt\Tests\Application\Resource;

use PHPUnit_Framework_TestCase,
    Zend_Application,
    Zend_Application_Bootstrap_Bootstrap,
    Zend_Controller_Front;

class NotifierTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->application = new Zend_Application('testing',$_SERVER['config_path']);
        $this->bootstrap = new Zend_Application_Bootstrap_Bootstrap($this->application);
        Zend_Controller_Front::getInstance()->resetInstance();
    }

    public function testConfig()
    {
        $this->assertNotNull($this->application->getOptions());
    }
}
