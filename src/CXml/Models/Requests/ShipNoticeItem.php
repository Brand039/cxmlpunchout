<?php

namespace CXml\Models\Requests;

class ShipNoticeItem
{
    /** @var int */
    private $quantity;

    /** @var int */
    private $lineNumber;

    /** @var string */
    private $unitOfMeasure;

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

    public function render(\SimpleXMLElement $parentNode): void
    {
        $node = $parentNode->addChild('ShipNoticeItem');
        $node->addAttribute('quantity', $this->quantity);
        $node->addAttribute('lineNumber', $this->lineNumber);

        // UnitOfMeasure
        $node->addChild('UnitOfMeasure',$this->unitOfMeasure);

    }

    private function formatPrice(float $price)
    {
        return number_format($price, 2, '.', '');
    }

}
