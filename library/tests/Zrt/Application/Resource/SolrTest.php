<?php

namespace Zrt\Tests;

use PHPUnit_Framework_TestCase,
    Zrt_Application_Resource_Solr,
    Zend_Application_Bootstrap_Bootstrap,
    Zend_Controller_Front,
    Zend_Application;

class SolrTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->application = new Zend_Application('testing');
        $this->bootstrap = new Zend_Application_Bootstrap_Bootstrap($this->application);
        Zend_Controller_Front::getInstance()->resetInstance();

    }

    public function testInitializerInstanceResourceSolr()
    {
        $options = array(
            'endpoint' => array(
                'aviso' => array(
                    'host' => '192.168.105.23',
                    'port' => 8080,
                    'path' => '/solr',
                    'core' => 'aviso',
                    'timeout' => 5
                ),
                'ubigeo' => array(
                    'host' => '192.168.105.23',
                    'port' => 8080,
                    'path' => '/solr',
                    'core' => 'ubigeo',
                    'timeout' => 5
                )
            )
        );
        $resource = new Zrt_Application_Resource_Solr($options);
        $resource->setBootstrap($this->bootstrap);
        $solr = $resource->init();
        $this->assertNotNull($solr);
        \Zend_Debug::dump($solr);

    }

    public function testInitializerInstance()
    {
        $options = array(
            'endpoint' => array(
                'aviso' => array(
                    'host' => '192.168.105.23',
                    'port' => 8080,
                    'path' => '/solr',
                    'core' => 'aviso',
                    'timeout' => 5
                ),
                'ubigeo' => array(
                    'host' => '192.168.105.23',
                    'port' => 8080,
                    'path' => '/solr',
                    'core' => 'ubigeo',
                    'timeout' => 5
                )
            )
        );

        $instance = new Zrt_Application_Resource_Solr();
        $this->assertNotNull($instance);
    }
}