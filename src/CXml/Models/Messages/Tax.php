<?php

namespace CXml\Models\Messages;

class Tax
{

 	/** @var string Tax total description */
    private $totalDescription;

    /** @var float */
    private $totalAmount;

    /** @var string Tax description */
    private $description;
    
    /** @var string Tax category */
    private $category;
    
    /** @var float Taxable amount*/
    private $taxableAmount;
    
    /** @var float Tax amount*/
    private $taxAmount;
    
    /** @var int Tax percentage rate*/
    private $percentageRate;

    public function getTotalDescription(): string
    {
        return $this->totalDescription;
    }

    public function setTotalDescription(string $totalDescription): self
    {
        $this->totalDescription = $totalDescription;
        return $this;
    }

    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(float $totalAmount): self
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function getTaxableAmount(): float
    {
        return $this->taxableAmount;
    }

    public function setTaxableAmount(float $taxableAmount): self
    {
        $this->taxableAmount = $taxableAmount;
        return $this;
    }

    public function getTaxAmount(): float
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(float $taxAmount): self
    {
        $this->taxAmount = $taxAmount;
        return $this;
    }

    public function getPercentageRate(): int
    {
        return $this->percentageRate;
    }

    public function setPercentageRate(int $percentageRate): self
    {
        $this->percentageRate = $percentageRate;
        return $this;
    }

    public function render(\SimpleXMLElement $parentNode, string $currency, string $locale): void
    {
        $node = $parentNode->addChild('Tax');

        $node->addChild('Money', $this->formatPrice($this->totalAmount))
        	->addAttribute('currency', $currency);

        $node->addChild('Description', $this->totalDescription)
            ->addAttribute('xml:xml:lang', $locale);

        $taxDetailsNode = $node->addChild('TaxDetail');
        $taxDetailsNode->addAttribute('category', $this->category);
        $taxDetailsNode->addAttribute('percentageRate', $this->percentageRate);

		$taxDetailsNode->addChild('TaxableAmount')->addChild('Money', $this->formatPrice($this->taxableAmount))
			->addAttribute('currency', $currency);        

		$taxDetailsNode->addChild('TaxAmount')->addChild('Money', $this->formatPrice($this->taxAmount))
			->addAttribute('currency', $currency);

		$taxDetailsNode->addChild('Description', $this->description)
            ->addAttribute('xml:xml:lang', $locale);
    }

    private function formatPrice(float $price)
    {
        return number_format($price, 2, '.', '');
    }

    
}




































