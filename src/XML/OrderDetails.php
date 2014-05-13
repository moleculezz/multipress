<?php
namespace WMC\MultiPress\XML;

class OrderDetails extends AbstractJobs
{
    public function __construct($job_number)
    {
        parent::__construct();
        $this->setJobNumber($job_number);
        $this->setQuotationNumber();
    }

    public function setJobNumber($value)
    {
        return $this->addElem('JOB_NUMBER', $value);
    }

    public function setQuotationNumber($value = 0)
    {
        return $this->addElem('QUOTATION_NUMBER', $value);
    }
}