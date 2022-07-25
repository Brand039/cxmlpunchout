<?php

namespace CXml;

use CXml\Models\Requests\PunchOutSetupRequest;
use CXml\Models\Requests\OrderRequest;
use CXml\Models\Requests\ConfirmationRequest;
use CXml\Models\Requests\ShipNoticeRequest;
use CXml\Models\Requests\RequestInterface;

class RequestFactory
{
    public function create(string $name) : RequestInterface
    {
        switch ($name) {
            case 'PunchOutSetupRequest':
                return new PunchOutSetupRequest();
            case 'OrderRequest':
                return new OrderRequest();
            case 'ConfirmationRequest':
                return new ConfirmationRequest();
            case 'ShipNoticeRequest':
                return new ShipNoticeRequest();
        }

        throw new \Exception("Request type '$name' is not supported");
    }
}
