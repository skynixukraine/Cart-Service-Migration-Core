<?php

namespace LitExtension\Core\Logger;

class Handler extends \Magento\Framework\Logger\Handler\Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/litextension.log';

    /**
     * @var int
     */
    protected $loggerType = 200;
}
