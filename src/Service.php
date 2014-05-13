<?php
namespace WMC\MultiPress;

use WMC\MultiPress\XML\Order;
use WMC\MultiPress\XML\OrderDetails;
use WMC\MultiPress\XML\InternetBufferStatus;

class Service
{
    private $connection;

    public function __construct(ClientInterface $connection)
    {
        $this->connection = $connection;
    }

    public function getServerInfo()
    {
        return $this->connection->request(0);
    }

    public function addOrder(Order $request)
    {
        return $this->connection->request(4, $request->xml->asXML());
    }

    public function getOrderDetails(OrderDetails $request)
    {
        return $this->connection->request(11, $request->xml->asXML());
    }

    public function getInternetBufferStatus(InternetBufferStatus $request)
    {
        return $this->connection->request(10, $request->xml->asXML());
    }

    public function getJobNumber(InternetBufferStatus $request)
    {
        $response = $this->getInternetBufferStatus($request);
        $processed = (string) $response->INTERNET_BUFFER->PROCESSED;
        if ($processed == 'JA') {
          return (string) $response->INTERNET_BUFFER->JOB_NUMBER;
        }

        return false;
    }

    public function getOrderStatusDetails()
    {
        return $this->connection->request(23);
    }
}
