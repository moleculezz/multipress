<?php
namespace WMC\MultiPress\XML;

abstract class AbstractInternetBuffer extends AbstractXML
{
    public function __construct()
    {
        parent::__construct();
        $this->parent = $this->xml->addChild('INTERNET_BUFFER');
    }
}
