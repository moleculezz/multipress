<?php
namespace WMC\MultiPress\XML;

abstract class AbstractInternetBuffer extends AbstractRoot
{
    public function __construct()
    {
        parent::__construct();
        $this->parent = $this->firstChild->appendChild(new \DOMElement('INTERNET_BUFFER'));
    }
}