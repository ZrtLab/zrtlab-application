<?php

class Zrt_Application_Bootstrap_Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public  function _initZrtSolr()
    {
        if(Zend_Registry::isRegistered('zrt.service.solr')){
            return;
        }

        $config = $this->getOptions();

        if(!isset($config['zrt']['services']['solr'])){
            return;
        }

        $configSolr = $config['zrt']['services']['solr'];

        if($configSolr){
            $serviceSolr = new Zrt_Service_Solr($configSolr);
            Zend_Registry::set('zrt.service.solr',$serviceSolr);
        }
    }
}
