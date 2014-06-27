<?php

/**
 * @author Luis Mayta <slovacus@gmail.com>
 */
class Zrt_Application extends Zend_Application
{

    /**
     *
     * @var Zend_Cache_Core|null
     */
    protected $_configCache;

    /**
     *
     * @param type $environment
     * @param type $inis
     * @param Zend_Cache_Core $configCache
     */
    public function __construct($environment, $inis = array(),
        Zend_Cache_Core $configCache = null)
    {
        if(empty($inis)){
            throw new Exception("No se encuentra ningun archivo de configuracion");
        }

        $this->_autoloader = Zend_Loader_Autoloader::getInstance();

        $this->_configCache = $configCache;

        $applicationIni = new Zend_Config_Ini(
            $inis["0"], $environment
        );

        unset($inis['0']);

        $options = $applicationIni->toArray();

        foreach ($inis as $ini) {
            if (!is_readable($ini)) {
                throw new Exception("Error El archivo {$ini} no es leible");
            }
            $config = $this->_loadConfig($ini);
            $options = $this->mergeOptions(
                $options, $config
            );
        }
        $this->setOptions($options);
    }

    protected function _cacheId($file)
    {
        return md5($file . '_' . $this->getEnvironment());
    }

    /**
     *
     * @param Zend_Config $config
     */
    public function addConfig(Zend_Config $config)
    {
        $this->_loadConfig($config);
    }

    /**
     *
     * @param type $file
     * @return type
     */
    protected function _loadConfig($file)
    {
        $suffix = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (
            $this->_configCache === null || $suffix == 'php' || $suffix == 'inc'
        ) {
            return parent::_loadConfig($file);
        }

        $configMTime = filemtime($file);

        $cacheId = $this->_cacheId($file);
        $cacheLastMTime = $this->_configCache->test($cacheId);
        if (
            $cacheLastMTime !== false && $configMTime < $cacheLastMTime
        ) {
            return $this->_configCache->load($cacheId, true);
        } else {
            $config = parent::_loadConfig($file);
            $this->_configCache->save($config, $cacheId, array(), null);

            return $config;
        }
    }

}
