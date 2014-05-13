<?php
namespace WMC\MultiPress;

interface ClientInterface
{
    public function request($method, $xml);
}