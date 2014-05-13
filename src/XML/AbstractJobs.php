<?php
namespace WMC\MultiPress\XML;

abstract class AbstractJobs extends AbstractXML
{
    public function __construct()
    {
        parent::__construct();
        $this->parent = $this->xml->addChild('JOBS');
    }
}
