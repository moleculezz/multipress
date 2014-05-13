<?php
namespace WMC\MultiPress\XML;

abstract class AbstractRoot extends \DomDocument
{
    public function __construct()
    {
        parent::__construct('1.0', 'UTF-8');
        $this->xmlStandalone = false;
        $this->appendChild(new \DOMElement('ROOT'));
    }
}