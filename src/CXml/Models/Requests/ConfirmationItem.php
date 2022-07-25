<?php

namespace CXml\Models\Requests;

class ConfirmationItem
{
    /** @var int */
    private $quantity;

    /** @var int */
    private $lineNumber;

    /** @var string */
    private $unitOfMeasure;

    /** @var string name */
    private $type;

    /** @var string */
    private $deliveryDate;

    /** @var string */
    private $shipmentDate;

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function setLineNumber(int $lineNumber): self
    {
        $this->lineNumber = $lineNumber;
        return $this;
    }

    public function setUnitOfMeasure(string $unitOfMeasure): self
    {
        $this->unitOfMeasure = $unitOfMeasure;
        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function setDeliveryDate(string $deliveryDate): self
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    public function setShipmentDate(string $shipmentDate): self
    {
        $this->shipmentDate = $shipmentDate;
        return $this;
    }

    public function render(\SimpleXMLElement $parentNode): void
    {
        $node = $parentNode->addChild('ConfirmationItem');
        $node->addAttribute('quantity', $this->quantity);
        $node->addAttribute('lineNumber', $this->lineNumber);

        // UnitOfMeasure
        $node->addChild('UnitOfMeasure',$this->unitOfMeasure);

        // ConfirmationStatus
        $nodeStatus = $node->addChild('ConfirmationStatus');
        $nodeStatus->addAttribute('type', $this->type);
        $nodeStatus->addAttribute('quantity', $this->quantity);
        $nodeStatus->addAttribute('deliveryDate', $this->deliveryDate);
        $nodeStatus->addAttribute('shipmentDate', $this->shipmentDate);

        // UnitOfMeasure
        $nodeStatus->addChild('UnitOfMeasure', $this->unitOfMeasure);

    }

    private function formatPrice(float $price)
    {
        return number_format($price, 2, '.', '');
    }

}
