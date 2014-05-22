<?php

/**
 * @author slovacus
 */
class Zrt_Application_Resource_Solr
    extends Zend_Application_Resource_ResourceAbstract
{

    private $solr;

    public function init()
    {
        if (!$this->solr) {
            if (!isset($this->_options['disabled']) || $this->_options['disabled']
                == false
            ) {
                $this->solr = new Zrt_Service_Solr($this->getOptions());
            }
        }

        Zend_Registry::set('solr', $this->solr);

        return $this->solr;
    }

}
