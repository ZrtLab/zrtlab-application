<?php

namespace Zrt\Tests\Application;

use Zrt_Application_Bootstrap_Bootstrap,
    PHPUnit_Framework_TestCase,
    Zend_Controller_Front,
    Zend_Registry,
    Zend_Application;

class BoostrapTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->application = new Zend_Application('testing',$_SERVER['config_path']);
        $this->bootstrap = new Zrt_Application_Bootstrap_Bootstrap($this->application);
        Zend_Controller_Front::getInstance()->resetInstance();
    }

    public function testInstanceRegistrySolr()
    {
        $this->assertNotNull(Zend_Registry::get('zrt.service.solr'));
    }
}
