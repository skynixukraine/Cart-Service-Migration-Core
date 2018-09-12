<?php

namespace LitExtension\Core\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Data
{
    protected $_config;
    
    public function __construct(
        \Magento\Framework\App\Config\ConfigResource\ConfigInterface $config
    ) {
        $this->_config = $config;
    }
    
    public function saveConfig($path, $value, $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeId = 0) {
        return $this->_config->saveConfig($path, $value, $scope, $scopeId);
    }
}
