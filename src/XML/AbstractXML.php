<?php
namespace WMC\MultiPress\XML;

abstract class AbstractXML
{
    const ROOT = '<?xml version="1.0" encoding="UTF-8" standalone="no" ?><ROOT></ROOT>';

    protected $parent;

    public function __construct()
    {
        $this->xml = new \SimpleXMLElement(self::ROOT);
    }

    protected function addElem($node, $value)
    {
        $a = (array)$this->parent->{$node};
        if (empty($a)) {
            $this->parent->addChild($node, $value);
        } else {
            $this->parent->{$node} = $value;
        }
        
        return $this;
    }
}