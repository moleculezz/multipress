<?php
namespace WMC\MultiPress\XML;

class InternetBufferStatus extends AbstractInternetBuffer
{

    public function __construct($unique_key)
    {
        parent::__construct();
        $this->setUniqueKey($unique_key);
    }

    public function setUniqueKey($value)
    {
        return $this->addElem('UNIQUE_KEY', $value);
    }

}
