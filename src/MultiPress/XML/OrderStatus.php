<?php
namespace WMC\MultiPress\XML;

class OrderStatus extends AbstractJobs
{
    public function __construct($job_number, $job_status_number)
    {
        parent::__construct();
        $this->setJobNumber($job_number);
        $this->setJobStatusNumber($job_status_number);
    }

    public function setJobNumber($value)
    {
        return $this->addElem('JOB_NUMBER', $value);
    }

    public function setJobStatusNumber($value)
    {
        return $this->addElem('JOB_STATUS_NUMBER', $value);
    }

    public function setJobStatus($value)
    {
        return $this->addElem('JOB_STATUS', $value);
    }

    public function setReason($value)
    {
        return $this->addElem('REASON', $value);
    }
}
