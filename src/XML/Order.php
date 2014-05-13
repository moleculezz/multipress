<?php
namespace WMC\MultiPress\XML;

class Order extends AbstractInternetBuffer
{

    private $delivery;

    public function __construct()
    {
        parent::__construct();
        $this->delivery = $this->parent->addChild('DELIVERY');
        $this->setType();
    }

    public function setType($value = 2)
    {
        return $this->addElem('TYPE', $value);
    }

    public function setRelation($value)
    {
        return $this->addElem('RELATION_NUMBER', $value);
    }

    public function setCompany($value)
    {
        return $this->setDelivery('COMPANY', $value);
    }

    public function setContactName($value)
    {
        return $this->setDelivery('CONTACT_NAME', $value);
    }

    public function setEmail($value)
    {
        return $this->setDelivery('EMAIL', $value);
    }

    public function setPhone($value)
    {
        return $this->setDelivery('PHONE', $value);
    }

    public function setAddress($value)
    {
        return $this->setDelivery('ADDRESS', $value);
    }

    public function setAddressNumber($value)
    {
        return $this->setDelivery('ADDRESS_NUMBER', $value);
    }

    public function setZipCode($value)
    {
        return $this->setDelivery('ZIPCODE', $value);
    }

    public function setCity($value)
    {
        return $this->setDelivery('CITY', $value);
    }

    public function setCountry($value)
    {
        return $this->setDelivery('COUNTRY', $value);
    }

    public function setCountryCode($value)
    {
        return $this->addElem('COUNTRY_CODE', $value);
    }

    public function setReference($value)
    {
        return $this->addElem('REFERENCE', $value);
    }

    public function setRemark($value)
    {
        return $this->addElem('REMARK', $value);
    }

    public function setProductType($value)
    {
        return $this->addElem('PRODUCT_TYPE', $value);
    }

    public function setProductNumber($value)
    {
        return $this->addElem('PRODUCT_NUMBER', $value);
    }

    /**
     * Sets the delivery date.
     * @param DateTime|string $date   The string should be a unix timestamp.
     * @param string          $format
     *
     * @return \WMC\MultiPress\XML\AbstractXML
     */
    public function setDeliveryDate($date, $format = 'd-m-Y')
    {
        if ($date instanceof \DateTime) {
            return $this->addElem('DELIVERY_DATE', $date->format($format));
        } else {
            return $this->addElem('DELIVERY_DATE', date($format, $date));
        }
    }

    public function setChecklistID($value)
    {
        return $this->addElem('CHECKLIST', $value);
    }

    public function setChecklist($items)
    {
        foreach ($items as $node => $value) {
            return $this->addElem($node, $value);
        }
    }

    public function setPrintRun($value)
    {
        return $this->addElem('RUN_01', $value);
    }

    private function addDeliveryAttrib($attribute, $value)
    {
        $this->delivery->addAttribute($attribute, $value);
    }

    private function setDelivery($name, $value)
    {
        $this->addDeliveryAttrib($name, $value);

        return $this->addElem($name, $value);
    }
}
