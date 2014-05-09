<?php
namespace WMC\MultiPress\Type;

abstract class AbstractType
{
    const ROOT = '<?xml version="1.0" encoding="UTF-8" standalone="no" ?><ROOT></ROOT>';

    public $xml = null;

    public function __construct()
    {
        $this->xml = new \SimpleXMLElement(self::ROOT);
    }

    public function toXML($node = null, $data = null)
    {
        if (is_null($node)) {
            if (!isset($this->rootNamespace)) {
                $node = $this->xml;
            } else {
                $node = $this->xml->{$this->rootNamespace};
            }
        }
        if (is_null($data)) {
            $data = get_object_vars($this);
            // TODO: Change class property setup to avoid having to unset other properties.
            unset($data['xml']);
            unset($data['rootNamespace']);
        }

        foreach ($data as $property => $value) {
            $element = strtoupper($property);
            if (is_object($value) || is_array($value)) {
                $this->toXML($node->addChild($element), $value);
            } else {
                $node->addChild($element, $value);
            }
        }
    }
}
