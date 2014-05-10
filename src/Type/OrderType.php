<?php
namespace WMC\MultiPress\Type;

class OrderType extends AbstractType
{

    const DATE_FORMAT = 'd-m-Y';

    private static $delivery_keys = ['company', 'address', 'address_number', 'zipcode', 'city', 'country', 'contact_name', 'email', 'phone'];

    protected $rootNamespace = 'INTERNET_BUFFER';

    protected $data = ['type' => 2];

    public function __construct()
    {
        parent::__construct();
        $this->xml->addChild($this->rootNamespace);
    }

    public function addData($data)
    {
        parent::addData($data);
        $this->setDeliveryNode();
    }

    private function setDeliveryNode()
    {
        foreach (self::$delivery_keys as $property) {
            if (!isset($this->data[$property])) {
                throw new \InvalidArgumentException('Property is not set');
            }
            $this->data['delivery'][$property] = $this->data[$property];
        }
    }

    public function addDeliveryDate($date)
    {
        if ($date instanceof DateTime) {
            $this->data['delivery_date'] = $date->format(self::DATE_FORMAT);
        } else {
            $this->data['delivery_date'] = date(self::DATE_FORMAT, $date);
        }
    }
}
