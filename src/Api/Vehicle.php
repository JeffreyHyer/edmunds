<?php

namespace Edmunds\Api;

class Vehicle extends AbstractApi
{

    public function __construct(\Edmunds\Edmunds $edmunds)
    {
        parent::__construct($edmunds);
        
        $this->edmunds->api = "vehicle";
    }

    /**
     * Fetch vehicle information from a provided VIN
     *
     * @return stdClass         Standard response object from $this->_respond()
     */
    public function vin($vin)
    {
        return $this->get("vins/{$vin}");
    }
}
