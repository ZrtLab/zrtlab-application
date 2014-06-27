<?php

namespace Zrt\Tests\Application;

use Zrt_Application_Bootstrap_Bootstrap,
    PHPUnit_Framework_TestCase,
    Zend_Controller_Front,
    Zend_Registry,
    Zrt_Application;

class BoostrapTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $filesConfig = array(
           $_SERVER["config_path"] . "/application.ini"
        );

        $this->application = new Zrt_Application(ENVIRONMENT,$filesConfig);
        $this->bootstrap = new Zrt_Application_Bootstrap_Bootstrap($this->application);
        $this->bootstrap->_initZrtSolr();
        Zend_Controller_Front::getInstance()->resetInstance();
    }

    public function testInstanceRegistrySolr()
    {
        //$this->bootstrap->_initZrtSolr();
        $this->assertNotNull(Zend_Registry::get('zrt.service.solr'));
    }
}
