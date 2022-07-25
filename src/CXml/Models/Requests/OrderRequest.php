<?php

namespace CXml\Models\Requests;

class OrderRequest implements RequestInterface
{
    /** @var string|null */
    private $operation;

    /** @var string|null */
    private $userEmail;

    /** @var string|null */
    private $firstName;

    /** @var string|null */
    private $lastName;

    /** @var string|null */
    private $phoneNumber;

    /** @var string|null */
    private $shipToNameAddress;

    /** @var string|null */
    private $shipToDeliverTo;

    /** @var string|null */
    private $shipToStreet;

    /** @var string|null */
    private $shipToCity;

    /** @var string|null */
    private $shipToState;

    /** @var string|null */
    private $shipToPostalCode;

    /** @var string|null */
    private $shipToCountry;

    /** @var string|null */
    private $shipToISOCountry;

    /** @var string|null */
    private $shipToIdAddress;

    /** @var string|null */
    private $shipToEmail;

    /** @var string|null */
    private $billToNameAddress;

    /** @var string|null */
    private $billToStreet;

    /** @var string|null */
    private $billToCity;

    /** @var string|null */
    private $billToState;

    /** @var string|null */
    private $billToPostalCode;

    /** @var string|null */
    private $billToCountry;

    /** @var string|null */
    private $billToISOCountry;

    /** @var string|null */
    private $orderDate;

    /** @var string|null */
    private $orderId;

    /** @var ItemIn[] */
    private $items = [];

    /** @noinspection PhpUndefinedFieldInspection */
    public function parse(\SimpleXMLElement $requestNode): void
    {
        $this->items = $requestNode->xpath('ItemOut');
        $this->orderDate = (string)$requestNode->xpath('OrderRequestHeader')[0]->attributes()->orderDate;
        $this->orderId = (string)$requestNode->xpath('OrderRequestHeader')[0]->attributes()->orderID;
        $this->shipToNameAddress = $requestNode->xpath('OrderRequestHeader/ShipTo/Address/Name')[0];
        $this->shipToDeliverTo = $requestNode->xpath('OrderRequestHeader/ShipTo/Address/PostalAddress/DeliverTo')[0];
        $this->shipToStreet = $requestNode->xpath('OrderRequestHeader/ShipTo/Address/PostalAddress/Street')[0];
        $this->shipToCity = $requestNode->xpath('OrderRequestHeader/ShipTo/Address/PostalAddress/City')[0];
        $this->shipToState = $requestNode->xpath('OrderRequestHeader/ShipTo/Address/PostalAddress/State')[0];
        $this->shipToPostalCode = $requestNode->xpath('OrderRequestHeader/ShipTo/Address/PostalAddress/PostalCode')[0];
        $this->shipToCountry = $requestNode->xpath('OrderRequestHeader/ShipTo/Address/PostalAddress/Country')[0];
        $this->shipToISOCountry = $requestNode->xpath('OrderRequestHeader/ShipTo/Address/PostalAddress/Country')[0]->attributes()->isoCountryCode;
        $this->shipToIdAddress = $requestNode->xpath('OrderRequestHeader/ShipTo/Address')[0]->attributes()->addressID;
        $this->shipToEmail = $requestNode->xpath('OrderRequestHeader/ShipTo/Address/Email')[0];
        $this->billToNameAddress = $requestNode->xpath('OrderRequestHeader/BillTo/Address/Name')[0];
        $this->billToStreet = $requestNode->xpath('OrderRequestHeader/BillTo/Address/PostalAddress/Street')[0];
        $this->billToCity = $requestNode->xpath('OrderRequestHeader/BillTo/Address/PostalAddress/City')[0];
        $this->billToState = $requestNode->xpath('OrderRequestHeader/BillTo/Address/PostalAddress/State')[0];
        $this->billToPostalCode = $requestNode->xpath('OrderRequestHeader/BillTo/Address/PostalAddress/PostalCode')[0];
        $this->billToCountry = $requestNode->xpath('OrderRequestHeader/BillTo/Address/PostalAddress/Country')[0];
        $this->billToISOCountry = $requestNode->xpath('OrderRequestHeader/BillTo/Address/PostalAddress/Country')[0]->attributes()->isoCountryCode;
        // $this->billToIdAddress = $requestNode->xpath('BillTo/Address')[0]->attributes()->addressID;
        // $this->operation = (string)$requestNode->attributes()->operation;
    }

    public function render(\SimpleXMLElement $parentNode): void
    {
        
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function setOperation(?string $operation): self
    {
        $this->operation = $operation;
        return $this;
    }

    public function getBuyerCookie(): ?string
    {
        return $this->buyerCookie;
    }

    public function setBuyerCookie(?string $buyerCookie): self
    {
        $this->buyerCookie = $buyerCookie;
        return $this;
    }

    public function getBrowserFormPostUrl(): ?string
    {
        return $this->browserFormPostUrl;
    }

    public function setBrowserFormPostUrl(?string $browserFormPostUrl): self
    {
        $this->browserFormPostUrl = $browserFormPostUrl;
        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getShipToNameAddress(): ?string
    {
        return $this->shipToNameAddress;
    }

    public function getShipToDeliverTo(): ?string
    {
        return $this->shipToDeliverTo;
    }

    public function getShipToStreet(): ?string
    {
        return $this->shipToStreet;
    }

    public function getShipToCity(): ?string
    {
        return $this->shipToCity;
    }

    public function getShipToState(): ?string
    {
        return $this->shipToState;
    }

    public function getShipToPostalCode(): ?string
    {
        return $this->shipToPostalCode;
    }

    public function getShipToCountry(): ?string
    {
        return $this->shipToCountry;
    }

    public function getShipToISOCountry(): ?string
    {
        return $this->shipToISOCountry;
    }

    public function getShipToIdAddress(): ?string
    {
        return $this->shipToIdAddress;
    }

    public function getShipToEmail(): ?string
    {
        return $this->shipToEmail;
    }

    public function getBillToNameAddress(): ?string
    {
        return $this->billToNameAddress;
    }

    public function getBillToStreet(): ?string
    {
        return $this->billToStreet;
    }

    public function getBillToCity(): ?string
    {
        return $this->billToCity;
    }

    public function getBillToState(): ?string
    {
        return $this->billToState;
    }

    public function getBillToPostalCode(): ?string
    {
        return $this->billToPostalCode;
    }

    public function getBillToCountry(): ?string
    {
        return $this->billToCountry;
    }

    public function getBillToISOCountry(): ?string
    {
        return $this->billToISOCountry;
    }

    /*public function getBillToIdAddress(): ?string
    {
        return $this->billToIdAddress;
    }*/

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }

    public function getOrderDate(): ?string
    {
        return $this->orderDate;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }
}
