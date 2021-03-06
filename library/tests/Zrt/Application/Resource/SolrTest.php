<?php

namespace Zrt\Tests\Application\Resource;

use PHPUnit_Framework_TestCase,
    Zrt_Application_Resource_Solr,
    Zrt_Application_Bootstrap_Bootstrap,
    Zend_Controller_Front,
    Zrt_Application,
    Zend_Registry;

class SolrTest extends PHPUnit_Framework_TestCase
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
    }

    public function testGetInstanceZendRegistrySolr()
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
        $this->assertNotNull(Zend_Registry::get('solr'));
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
