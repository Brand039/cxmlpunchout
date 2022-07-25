<?php

namespace CXml\Models\Requests;

interface RequestInterface
{
    public function parse(\SimpleXMLElement $requestNode) : void;
    
    /** Appends the message node to the specified parent node */
    public function render(\SimpleXMLElement $parentNode) : void;
}
