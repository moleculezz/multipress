<?php
namespace WMC\MultiPress;

class Client extends \SoapClient implements ClientInterface
{
    public function __construct($wsdl, $options)
    {
        foreach ($options as $key => $value) {
            if (!in_array($key, array('login', 'password'))) {
                throw new \InvalidArgumentException("You must specify 'login' and 'password' to authenticate.");
            }

            if (empty($value)) {
                throw new \InvalidArgumentException('Argument value is empty.');
            }
        }

        $handle = curl_init($wsdl);
        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($handle);
        $http_code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);
        if ($http_code != 200) {
            throw new \Exception("Could not make a connection to the WSDL, service is down.");
        }

        try {
            parent::__construct($wsdl, $options);
        } catch (\SoapFault $e) {
            throw $e;
        }

    }

    public function request($method, $xml = null)
    {
        try {
            $response = $this->__soapCall('SOAP_LINK', [$method, $xml]);
            return simplexml_load_string($response['output']);
        } catch (\SoapFault $e) {
            throw $e;
        }
    }
}
