# Multi-Press SOAP webservice API

This PHP package makes it easier to work with the Multi-Press SOAP Service.

```php
$conn = new \WMC\MultiPress\Client('http://example.com/multipress.wsdl', ['login' => 'example', 'password' => 'examplepassword']);
$mp = new \WMC\MultiPress\Service($conn);
$xml = $mp->getServerInfo();

$orderRequest = new \WMC\MultiPress\XML\Order();
$orderRequest
    ->setRelation('123456')
    ->setCompany('Example Inc.')
    ->setPrintRun('5000')
    ->setDeliveryDate(new \DateTime());
 
$xml = $mp->addOrder($orderRequest);
```
