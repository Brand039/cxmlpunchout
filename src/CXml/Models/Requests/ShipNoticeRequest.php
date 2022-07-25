<?php

namespace CXml\Models\Requests;

class ShipNoticeRequest implements RequestInterface
{
    /** @var string */
    private $currency = 'EUR';

    /** @var string string */
    private $locale = 'it-IT';

    /** @var string|null */
    private $shipmentID;

    /** @var string|null */
    private $operation;

    /** @var string|null */
    private $noticeDate;

    /** @var string|null */
    private $shipmentDate;

    /** @var string|null */
    private $deliveryDate;

    /** @var string|null */
    private $shipFromName;

    /** @var string|null */
    private $shipFromStreet;

    /** @var string|null */
    private $shipFromCity;

    /** @var string|null */
    private $shipFromState;

    /** @var string|null */
    private $shipFromPostalCode;

    /** @var string|null */
    private $shipFromCountry;

    /** @var string|null */
    private $shipFromCountryISO;

    /** @var string|null */
    private $shipToName;

    /** @var string|null */
    private $shipToDeliverTo1;

    /** @var string|null */
    private $shipToDeliverTo2;

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
    private $shipToCountryISO;

    /** @var string|null */
    private $carrierID1;

    /** @var string|null */
    private $carrierIDDom1;

    /** @var string|null */
    private $carrierID2;

    /** @var string|null */
    private $carrierIDDom2;

    /** @var string|null */
    private $shipmentIdentifier;

    /** @var string|null */
    private $shipmentTrackURL;

    /** @var string|null */
    private $orderID;

    /** @var string|null */
    private $payloadID;

    /** @var ShipNoticeItem[] */
    private $items = [];

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;
        return $this;
    }

    public function setShipmentID(?string $shipmentID): self
    {
        $this->shipmentID = $shipmentID;
        return $this;
    }

    public function setOperation(?string $operation): self
    {
        $this->operation = $operation;
        return $this;
    }

    public function setNoticeDate(?string $noticeDate): self
    {
        $this->noticeDate = $noticeDate;
        return $this;
    }

    public function setShipmentDate(?string $shipmentDate): self
    {
        $this->shipmentDate = $shipmentDate;
        return $this;
    }

    public function setDeliveryDate(?string $deliveryDate): self
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    public function setShipFromName(?string $shipFromName): self
    {
        $this->shipFromName = $shipFromName;
        return $this;
    }

    public function setShipFromStreet(?string $shipFromStreet): self
    {
        $this->shipFromStreet = $shipFromStreet;
        return $this;
    }

    public function setShipFromCity(?string $shipFromCity): self
    {
        $this->shipFromCity = $shipFromCity;
        return $this;
    }

    public function setShipFromState(?string $shipFromState): self
    {
        $this->shipFromState = $shipFromState;
        return $this;
    }

    public function setShipFromPostaCode(?string $shipFromPostalCode): self
    {
        $this->shipFromPostalCode = $shipFromPostalCode;
        return $this;
    }

    public function setShipFromCountry(?string $shipFromCountry): self
    {
        $this->shipFromCountry = $shipFromCountry;
        return $this;
    }

    public function setShipFromCountryISO(?string $shipFromCountryISO): self
    {
        $this->shipFromCountryISO = $shipFromCountryISO;
        return $this;
    }

    public function setShipToName(?string $shipToName): self
    {
        $this->shipToName = $shipToName;
        return $this;
    }

    public function setShipToDeliverTo1(?string $shipToDeliverTo1): self
    {
        $this->shipToDeliverTo1 = $shipToDeliverTo1;
        return $this;
    }

    public function setShipToDeliverTo2(?string $shipToDeliverTo2): self
    {
        $this->shipToDeliverTo2 = $shipToDeliverTo2;
        return $this;
    }

    public function setShipToStreet(?string $shipToStreet): self
    {
        $this->shipToStreet = $shipToStreet;
        return $this;
    }

    public function setShipToCity(?string $shipToCity): self
    {
        $this->shipToCity = $shipToCity;
        return $this;
    }

    public function setShipToState(?string $shipToState): self
    {
        $this->shipToState = $shipToState;
        return $this;
    }

    public function setShipToPostaCode(?string $shipToPostalCode): self
    {
        $this->shipToPostalCode = $shipToPostalCode;
        return $this;
    }

    public function setShipToCountry(?string $shipToCountry): self
    {
        $this->shipToCountry = $shipToCountry;
        return $this;
    }

    public function setShipToCountryISO(?string $shipToCountryISO): self
    {
        $this->shipToCountryISO = $shipToCountryISO;
        return $this;
    }

    public function setCarrierID1(?string $carrierID1): self
    {
        $this->carrierID1 = $carrierID1;
        return $this;
    }

    public function setCarrierIDDom1(?string $carrierIDDom1): self
    {
        $this->carrierIDDom1 = $carrierIDDom1;
        return $this;
    }

    public function setCarrierID2(?string $carrierID2): self
    {
        $this->carrierID2 = $carrierID2;
        return $this;
    }

    public function setCarrierIDDom2(?string $carrierIDDom2): self
    {
        $this->carrierIDDom2 = $carrierIDDom2;
        return $this;
    }

    public function setShipmentIdentifier(?string $shipmentIdentifier): self
    {
        $this->shipmentIdentifier = $shipmentIdentifier;
        return $this;
    }

    public function setShimpentTrackURL(?string $shimpentTrackURL): self
    {
        $this->shimpentTrackURL = $shimpentTrackURL;
        return $this;
    }

    public function setOrderID(?string $orderID): self
    {
        $this->orderID = $orderID;
        return $this;
    }

    public function setPayloadID(?string $payloadID): self
    {
        $this->payloadID = $payloadID;
        return $this;
    }

    public function addItem(ShipNoticeItem $item) : self
    {
        $this->items[] = $item;
        return $this;
    }

    public function render(\SimpleXMLElement $parentNode): void
    {
        $node = $parentNode->addChild('ShipNoticeRequest');
        // Header
        $nodeHeader = $node->addChild('ShipNoticeHeader');
        $nodeHeader->addAttribute('shipmentID', $this->shipmentID);
        $nodeHeader->addAttribute('operation', $this->operation);
        $nodeHeader->addAttribute('noticeDate', $this->noticeDate);
        $nodeHeader->addAttribute('shipmentDate', $this->shipmentDate);
        $nodeHeader->addAttribute('deliveryDate', $this->deliveryDate);
        
        // Contact from
        $shipFrom = $nodeHeader->addChild('Contact');
        $shipFrom->addAttribute('role','shipFrom');
        $shipFrom->addChild('Name', $this->shipFromName)->addAttribute('xml:xml:lang', $this->locale);
        $shipFromAddress = $shipFrom->addChild('PostalAddress');
        $shipFromAddress->addChild('Street', $this->shipFromStreet);
        $shipFromAddress->addChild('City', $this->shipFromCity);
        $shipFromAddress->addChild('State', $this->shipFromState);
        $shipFromAddress->addChild('PostalCode', $this->shipFromPostalCode);
        $shipFromAddress->addChild('Country', $this->shipFromCountry)->addAttribute('isoCountryCode', $this->shipFromCountryISO);
        
        // Contact to
        $shipTo = $nodeHeader->addChild('Contact');
        $shipTo->addAttribute('role','shipTo');
        $shipTo->addChild('Name', $this->shipToName)->addAttribute('xml:xml:lang', $this->locale);
        $shipToAddress = $shipTo->addChild('PostalAddress');
        $shipToAddress->addChild('DeliverTo', $this->shipToDeliverTo1);
        $shipToAddress->addChild('DeliverTo', $this->shipToDeliverTo2);
        $shipToAddress->addChild('Street', $this->shipToStreet);
        $shipToAddress->addChild('City', $this->shipToCity);
        $shipToAddress->addChild('State', $this->shipToState);
        $shipToAddress->addChild('PostalCode', $this->shipToPostalCode);
        $shipToAddress->addChild('Country', $this->shipToCountry)->addAttribute('isoCountryCode', $this->shipToCountryISO);

        // ShipControl
        $nodeControl = $node->addChild('ShipControl');
        $nodeControl->addChild('CarrierIdentifier', $this->carrierID1)->addAttribute('domain', $this->carrierIDDom1);
        $nodeControl->addChild('CarrierIdentifier', $this->carrierID2)->addAttribute('domain', $this->carrierIDDom2);
        $nodeControl->addChild('ShipmentIdentifier', $this->shipmentIdentifier)->addAttribute('trackingURL', $this->shimpentTrackURL);

        // ShipNoticePortion
        $shipPortion = $node->addChild('ShipNoticePortion');
        $nodeOrderRef = $shipPortion->addChild('OrderReference');
        $nodeOrderRef->addAttribute('orderID', $this->orderID);
        $nodeOrderRef->addChild('DocumentReference')->addAttribute('payloadID', $this->payloadID);

        // Confirmation item
        foreach ($this->items as $item) {
            $item->render($shipPortion);
        }
    }

    public function parse(\SimpleXMLElement $requestNode): void
    {
        
    }
    
}
