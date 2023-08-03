<?php

namespace CXml\Models;

use CXml\Models\Responses\ResponseInterface;

class Header
{
    private $fromIdentity;
    private $toIdentity;
    private $senderIdentity;
    private $senderDomain;
    private $senderSharedSecret;

    public function getFromIdentity()
    {
        return $this->fromIdentity;
    }

    public function setFromIdentity($fromIdentity): self
    {
        $this->fromIdentity = $fromIdentity;
        return $this;
    }

    public function getToIdentity()
    {
        return $this->toIdentity;
    }

    public function setToIdentity($toIdentity): self
    {
        $this->toIdentity = $toIdentity;
        return $this;
    }

    public function getSenderIdentity()
    {
        return $this->senderIdentity;
    }

    public function setSenderIdentity($senderIdentity): self
    {
        $this->senderIdentity = $senderIdentity;
        return $this;
    }

    public function getSenderDomain()
    {
        return $this->senderDomain;
    }

    public function setSenderDomain($senderDomain): self
    {
        $this->senderDomain = $senderDomain;
        return $this;
    }

    public function getSenderSharedSecret()
    {
        return $this->senderSharedSecret;
    }

    public function setSenderSharedSecret($senderSharedSecret): self
    {
        $this->senderSharedSecret = $senderSharedSecret;
        return $this;
    }

    public function parse(\SimpleXMLElement $headerXml) : void
    {   
        $this->fromIdentity = (string)$headerXml->xpath('From/Credential/Identity')[0];
        $this->toIdentity = (string)$headerXml->xpath('To/Credential/Identity')[0];
        $this->senderIdentity = (string)$headerXml->xpath('Sender/Credential/Identity')[0];
        $this->senderSharedSecret = (string)$headerXml->xpath('Sender/Credential/SharedSecret')[0];
    }

    public function render(\SimpleXMLElement $parentNode) : void
    {
        $headerNode = $parentNode->addChild('Header');

        $this->addNode($headerNode, 'From', $this->getFromIdentity() ?? 'Unknown', 'NetworkID');
        $this->addNode($headerNode, 'To', $this->getToIdentity() ?? 'Unknown', 'NetworkID');
        $this->addNode($headerNode, 'Sender', $this->getSenderIdentity() ?? 'Unknown', 'NetworkID')
            ->addChild('UserAgent', 'Gecal Store Spa');
    }

    private function addNode(\SimpleXMLElement $parentNode, string $nodeName, string $identity, string $domain) : \SimpleXMLElement
    {
        $node = $parentNode->addChild($nodeName);

        $credentialNode = $node->addChild('Credential');
        $credentialNode->addAttribute('domain', $domain);

        $credentialNode->addChild('Identity', $identity);
        if (!empty($this->senderSharedSecret) && $nodeName == 'Sender') {
            $credentialNode->addChild('SharedSecret', $this->senderSharedSecret);
        }

        return $node;
    }
}
