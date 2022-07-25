<?php

namespace CXml\Models\Requests;

class ConfirmationRequest implements RequestInterface
{
    /** @var string */
    private $currency = 'EUR';

    /** @var string string */
    private $locale = 'it-IT';

    /** @var string|null */
    private $noticeDate;

    /** @var string|null */
    private $type;

    /** @var string|null */
    private $operation;

    /** @var string|null */
    private $confirmID;

    /** @var string|null */
    private $comments;

    /** @var string|null */
    private $orderID;

    /** @var string|null */
    private $payloadID;

    /** @var float|null */
    private $total;

    /** @var float|null */
    private $taxTotal;

    /** @var string|null */
    private $taxDescription;

    /** @var ConfirmationItem[] */
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

    public function setNoticeDate(?string $noticeDate): self
    {
        $this->noticeDate = $noticeDate;
        return $this;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function setOperation(?string $operation): self
    {
        $this->operation = $operation;
        return $this;
    }

    public function setConfirmID(?string $confirmID): self
    {
        $this->confirmID = $confirmID;
        return $this;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;
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

    public function setTotal(?float $total): self
    {
        $this->total = $total;
        return $this;
    }

    public function setTaxTotal(?float $taxTotal): self
    {
        $this->taxTotal = $taxTotal;
        return $this;
    }

    public function setTaxDescription(?string $taxDescription): self
    {
        $this->taxDescription = $taxDescription;
        return $this;
    }

    public function addItem(ConfirmationItem $item) : self
    {
        $this->items[] = $item;
        return $this;
    }

    public function render(\SimpleXMLElement $parentNode): void
    {
        $node = $parentNode->addChild('ConfirmationRequest');
        // Header
        $nodeHeader = $node->addChild('ConfirmationHeader');
        $nodeHeader->addAttribute('noticeDate', $this->noticeDate);
        $nodeHeader->addAttribute('type', $this->type);
        $nodeHeader->addAttribute('operation', $this->operation);
        $nodeHeader->addAttribute('confirmID', $this->confirmID);
        
        // Total in header
        $nodeHeaderCom = $nodeHeader->addChild('Total');
        $nodeHeaderCom->addChild('Money', $this->formatPrice($this->total))->addAttribute('currency', $this->currency);
        
        // Tax in header
        $nodeHeaderCom = $nodeHeader->addChild('Tax');
        $nodeHeaderCom->addChild('Money', $this->formatPrice($this->taxTotal))->addAttribute('currency', $this->currency);
        $nodeHeaderCom->addChild('Description', $this->taxDescription)->addAttribute("xml:xml:lang", $this->locale);
        
        // Comments in header
        $nodeHeaderCom = $nodeHeader->addChild('Comments', $this->comments);
        $nodeHeaderCom->addAttribute("xml:xml:lang", $this->locale);

        // OrderReference
        $nodeOrderRef = $node->addChild('OrderReference');
        $nodeOrderRef->addAttribute('orderID', $this->orderID);
        $nodeOrderRef->addChild('DocumentReference')->addAttribute('payloadID', $this->payloadID);

        // Confirmation item
        foreach ($this->items as $item) {
            $item->render($node);
        }
    }

    public function parse(\SimpleXMLElement $requestNode): void
    {
        
    }

    private function formatPrice(float $price)
    {
        return number_format($price, 2, '.', '');
    }


    
}
