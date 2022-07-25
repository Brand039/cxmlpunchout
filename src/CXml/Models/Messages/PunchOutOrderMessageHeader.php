<?php


namespace CXml\Models\Messages;


class PunchOutOrderMessageHeader
{
    /** @var float */
    private $totalAmount;

    /** @var string */
    private $supplierOrderInfo;

    /** @var float|null */
    private $shippingCost;

    /** @var string */
    private $shippingDescription;

    /** @var float */
    private $taxSum;

    /** @var string */
    private $taxDescription;

    /** @var string */
    private $aziRiferimento;

    /** @var string */
    private $aziNumeroOrdine;

    /** @var string */
    private $aziDataOrdine;

    /** @var string */
    private $aziEvasioneTotale;

    /** @var string */
    private $note;

    /** @var string */
    private $noteSped;


    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(float $totalAmount): self
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    public function getSupplierOrderInfo(): string
    {
        return $this->supplierOrderInfo;
    }

    public function setSupplierOrderInfo(string $supplierOrderInfo): self
    {
        $this->supplierOrderInfo = $supplierOrderInfo;
        return $this;
    }

    public function getShippingCost(): ?float
    {
        return $this->shippingCost;
    }

    public function setShippingCost(?float $shippingCost): self
    {
        $this->shippingCost = $shippingCost;
        return $this;
    }

    public function getShippingDescription(): string
    {
        return $this->shippingDescription;
    }

    public function setShippingDescription(string $shippingDescription): self
    {
        $this->shippingDescription = $shippingDescription;
        return $this;
    }

    public function getTaxSum(): float
    {
        return $this->taxSum;
    }

    public function setTaxSum(float $taxSum): self
    {
        $this->taxSum = $taxSum;
        return $this;
    }

    public function getTaxDescription(): string
    {
        return $this->taxDescription;
    }

    public function setTaxDescription(string $taxDescription): self
    {
        $this->taxDescription = $taxDescription;
        return $this;
    }

    public function getAziRiferimento(): string
    {
        return $this->aziRiferimento;
    }

    public function setAziRiferimento(string $aziRiferimento): self
    {
        $this->aziRiferimento = $aziRiferimento;
        return $this;
    }

    public function getAziNumeroOrdine(): string
    {
        return $this->aziNumeroOrdine;
    }

    public function setAziNumeroOrdine(string $aziNumeroOrdine): self
    {
        $this->aziNumeroOrdine = $aziNumeroOrdine;
        return $this;
    }

    public function getAziDataOrdine(): string
    {
        return $this->aziDataOrdine;
    }

    public function setAziDataOrdine(string $aziDataOrdine): self
    {
        $this->aziDataOrdine = $aziDataOrdine;
        return $this;
    }

    public function getAziEvasioneTotale(): string
    {
        return $this->aziEvasioneTotale;
    }

    public function setAziEvasioneTotale(string $aziEvasioneTotale): self
    {
        $this->aziEvasioneTotale = $aziEvasioneTotale;
        return $this;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;
        return $this;
    }

    public function getNoteSped(): string
    {
        return $this->noteSped;
    }

    public function setNoteSped(string $noteSped): self
    {
        $this->noteSped = $noteSped;
        return $this;
    }

    public function render(\SimpleXMLElement $parentNode, string $currency, string $locale): void
    {
        $node = $parentNode->addChild('PunchOutOrderMessageHeader');
        $node->addAttribute('operationAllowed', 'edit');

        // Total
        $this->addPriceNode($node, 'Total', $currency, $this->totalAmount);

        // SupplierOrderInfo
        if (!empty($this->supplierOrderInfo)) {
            $node->addChild('SupplierOrderInfo', $this->supplierOrderInfo); 
        }

        /*// Shipping
        $this->addPriceNode($node, 'Shipping', $currency, $this->shippingCost, $this->shippingDescription, $locale);*/

        // Tax
        $this->addPriceNode($node, 'Tax', $currency, $this->taxSum, $this->taxDescription, $locale);
        
        /*if ($this->aziNumeroOrdine !== null) {
            $node->addChild('Extrinsic', $this->aziRiferimento)->addAttribute('name', 'aziRiferimento');
        }

        if ($this->aziNumeroOrdine !== null) {
            $node->addChild('Extrinsic', $this->aziNumeroOrdine)->addAttribute('name', 'aziNumeroOrdine');
        }

        if ($this->aziDataOrdine !== null) {
            $node->addChild('Extrinsic', $this->aziDataOrdine)->addAttribute('name', 'aziDataOrdine');
        }

        if ($this->aziEvasioneTotale !== null) {
            $node->addChild('Extrinsic', $this->aziEvasioneTotale)->addAttribute('name', 'aziEvasioneTotale');
        }

        if ($this->note !== null) {
            $node->addChild('Extrinsic', $this->note)->addAttribute('name', 'note');
        }

        if ($this->noteSped !== null) {
            $node->addChild('Extrinsic', $this->noteSped)->addAttribute('name', 'noteSped');
        }*/
    }

    private function formatPrice(float $totalAmount)
    {
        return number_format($totalAmount, 2, '.', '');
    }

    private function addPriceNode(\SimpleXMLElement $parentNode, string $name, string $currency, float $priceValue, string $description = null, string $locale = null)
    {
        $node = $parentNode->addChild($name);

        $node
            ->addChild('Money', $this->formatPrice($priceValue))
            ->addAttribute('currency', $currency);

        if ($description !== null) {
            $node->addChild('Description', $description)
                ->addAttribute('xml:xml:lang', $locale);
        }
    }
}
