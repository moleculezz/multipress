<?php
namespace WMC\MultiPress\Type;

class OrderType extends AbstractType
{

    private static $delivery_keys = ['company', 'address', 'address_number', 'zipcode', 'city', 'country', 'contact_name', 'email', 'phone'];

    protected $rootNamespace = 'INTERNET_BUFFER';

    public $type = 2;

    /**
     * @example  $data = [
     *                      'company'  => '', 'contact_name'     => '', 'email'             => '', 'phone'                 => '',
     *                      'address'    => '', 'address_number' => '', 'zipcode'          => '', 'city'                     => '', 'country' => '', 'country_code' => '',
     *                      'reference' => '', 'remark'                => '', 'product_type' => '', 'product_number' => '',
     *                   ];
     **/

    public function __construct()
    {
        parent::__construct();
        $this->xml->addChild($this->rootNamespace);
    }

    public function addData($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

        $this->setDelivery();
    }

    private function setDelivery()
    {
        $this->delivery = new \stdClass();
        foreach (self::$delivery_keys as $property) {
            if (!isset($this->{$property})) {
                throw new \InvalidArgumentException('Object property is not set');
            }
            $this->delivery->{$property} = $this->{$property};
        }
    }

    public function addDeliveryDate($dateString)
    {
        //$this->delivery_date = 
    }

    /**
     * 
     * @example $data = [ 'text_01' => '', 'text_02' => '', .... ]
     */
    public function setChecklist($data)
    {
        $this->checklist = new \stdClass();
        foreach ($data as $property => $value) {
            $this->checklist->{$property} = $value;
        }
    }
}
