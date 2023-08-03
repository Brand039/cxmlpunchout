<?php

namespace CXml\Models\Requests;

class PunchOutSetupRequest implements RequestInterface
{
    /** @var string|null */
    private $operation;

    /** @var string|null */
    private $buyerCookie;

    /** @var string|null */
    private $browserFormPostUrl;

    /** @var string|null */
    private $userEmail;

    /** @var string|null */
    private $firstName;

    /** @var string|null */
    private $lastName;

    /** @var string|null */
    private $phoneNumber;

    /** @var string|null */
    private $nameAddress;

    /** @var string|null */
    private $street;

    /** @var string|null */
    private $city;

    /** @var string|null */
    private $state;

    /** @var string|null */
    private $postalCode;

    /** @var string|null */
    private $country;

    /** @var string|null */
    private $idAddress;

    /** @var ItemIn[] */
    private $items = [];

    /** @noinspection PhpUndefinedFieldInspection */
    public function parse(\SimpleXMLElement $requestNode): void
    {
        $this->operation = (string)$requestNode->attributes()->operation;
        $this->buyerCookie = $requestNode->xpath('BuyerCookie')[0];
        $this->browserFormPostUrl = $requestNode->xpath('BrowserFormPost/URL')[0];
        // $this->userEmail = $requestNode->xpath('Extrinsic')[0];
        // $this->firstName = $requestNode->xpath('Extrinsic')[1];
        // $this->lastName = $requestNode->xpath('Extrinsic')[2];
        // $this->phoneNumber = $requestNode->xpath('Extrinsic')[3];
        $this->nameAddress = $requestNode->xpath('ShipTo/Address/Name')[0];
        $this->street = $requestNode->xpath('ShipTo/Address/PostalAddress/Street')[0];
        $this->city = $requestNode->xpath('ShipTo/Address/PostalAddress/City')[0];
        $this->state = $requestNode->xpath('ShipTo/Address/PostalAddress/State')[0];
        $this->postalCode = $requestNode->xpath('ShipTo/Address/PostalAddress/PostalCode')[0];
        $this->country = $requestNode->xpath('ShipTo/Address/PostalAddress/Country')[0];
        $this->idAddress = $requestNode->xpath('ShipTo/Address')[0];
        if (!empty($this->idAddress)) { 
            $this->idAddress = $this->idAddress->attributes()->addressID; 
        }
        $this->items = $requestNode->xpath('ItemOut');
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

    public function getNameAddress(): ?string
    {
        return $this->nameAddress;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getIDAddress(): ?string
    {
        return $this->idAddress;
    }

    public function getItems(): ?array
    {
        return $this->items;
    }
}
