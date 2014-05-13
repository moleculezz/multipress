<?php
namespace WMC\MultiPress\XML;

class Order extends AbstractInternetBuffer
{

    private $delivery;

    public function __construct()
    {
        parent::__construct();
        $this->delivery = $this->parent->appendChild(new \DOMElement('DELIVERY'));
    }

    public function setRelation($value)
    {
        return $this->createElem('RELATION_NUMBER', $value);
    }

    public function setCompany($value)
    {
        $this->setDelivery('COMPANY', $value);
        return $this->createElem('COMPANY', $value);
    }

    private function createElem($node, $value)
    {
        $el = $this->createElement($node, $value);
        $this->parent->appendChild($el);
        return $this;
    }

    private function setDelivery($attribute, $value)
    {
        $this->delivery->setAttribute($attribute, $value);
    }
}