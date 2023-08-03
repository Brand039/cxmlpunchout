<?php

namespace CXml\Models\Messages;

class ItemIn
{
    /** @var int */
    private $quantity;

    /** @var string Product SKU */
    private $supplierPartId;

    /** @var string Product SKU */
    private $supplierPartAuxiliaryId;

    /** @var float */
    private $unitPrice;

    /** @var string Product name */
    private $description;

    /** @var string */
    private $unitOfMeasure;

    /** @var string */
    private $unspscClassificationDomain;

    /** @var string */
    private $unspscClassification;

    /** @var string */
    private $manufacturerPartId;

    /** @var string */
    private $manufacturerName;

    /** @var string */
    private $image;

    /** @var int|null */
    private $leadTime;

    /** @var string|null */
    private $requestedDeliveryDate;

    /** @var string|null */
    private $requester;

    /** @var Tax[] */
    private $taxes;

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getSupplierPartId(): string
    {
        return $this->supplierPartId;
    }

    public function setSupplierPartId(string $supplierPartId): self
    {
        $this->supplierPartId = $supplierPartId;
        return $this;
    }

    public function getSupplierPartAuxiliaryId(): string
    {
        return $this->supplierPartAuxiliaryId;
    }

    public function setSupplierPartAuxiliaryId(string $supplierPartAuxiliaryId): self
    {
        $this->supplierPartAuxiliaryId = $supplierPartAuxiliaryId;
        return $this;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;
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

    public function getUnitOfMeasure(): string
    {
        return $this->unitOfMeasure;
    }

    public function setUnitOfMeasure(string $unitOfMeasure): self
    {
        $this->unitOfMeasure = $unitOfMeasure;
        return $this;
    }

    public function getUNSPSCClassificationDomain(): string
    {
        return $this->unspscClassificationDomain;
    }

    public function setUNSPSCClassificationDomain(string $unspscClassificationDomain): self
    {
        $this->unspscClassificationDomain = $unspscClassificationDomain;
        return $this;
    }

    public function getUNSPSCClassification(): string
    {
        return $this->unspscClassification;
    }

    public function setUNSPSCClassification(string $unspscClassification): self
    {
        $this->unspscClassification = $unspscClassification;
        return $this;
    }

    public function getECLASSClassificationDomain(): string
    {
        return $this->eclassClassificationDomain;
    }

    public function setECLASSClassificationDomain(string $eclassClassificationDomain): self
    {
        $this->eclassClassificationDomain = $eclassClassificationDomain;
        return $this;
    }

    public function getECLASSClassification(): string
    {
        return $this->eclassclassification;
    }

    public function setECLASSClassification(string $eclassClassification): self
    {
        $this->eclassClassification = $eclassClassification;
        return $this;
    }

    public function getManufacturerPartId(): string
    {
        return $this->manufacturerPartId;
    }

    public function setManufacturerPartId(string $manufacturerPartId): self
    {
        $this->manufacturerPartId = $manufacturerPartId;
        return $this;
    }

    public function getManufacturerName(): string
    {
        return $this->manufacturerName;
    }

    public function setManufacturerName(string $manufacturerName): self
    {
        $this->manufacturerName = $manufacturerName;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getRequestedDeliveryDate(): ?string
    {
        return $this->requestedDeliveryDate;
    }

    public function setRequestedDeliveryDate(?string $requestedDeliveryDate): self
    {
        $this->requestedDeliveryDate = $requestedDeliveryDate;
        return $this;
    }

    public function getRequester(): ?string
    {
        return $this->requester;
    }

    public function setRequester(?string $requester): self
    {
        $this->requester = $requester;
        return $this;
    }

    public function getTaxes(): array
    {
        return $this->taxes;
    }

    public function setTaxes(array $taxes): self
    {
        $this->taxes = $taxes;
        return $this;
    }

    public function addTax(Tax $tax) : self
    {
        $this->taxes[] = $tax;
        return $this;
    }

    public function render(\SimpleXMLElement $parentNode, string $currency, string $locale): void
    {
        $node = $parentNode->addChild('ItemIn');
        $node->addAttribute('quantity', $this->quantity);

        // ItemID
        $itemIdNode = $node->addChild('ItemID');
        $itemIdNode->addChild('SupplierPartID', $this->supplierPartId);
        $itemIdNode->addChild('SupplierPartAuxiliaryID', $this->supplierPartAuxiliaryId);

        // ItemDetails
        $itemDetailsNode = $node->addChild('ItemDetail');

        // UnitPrice
        $itemDetailsNode->addChild('UnitPrice')->addChild('Money', $this->formatPrice($this->unitPrice))
            ->addAttribute('currency', $currency);

        // Description
        $itemDetailsNode->addChild('Description', $this->description)
            ->addAttribute('xml:xml:lang', $locale);

        // UnitOfMeasure
        $itemDetailsNode->addChild('UnitOfMeasure', $this->unitOfMeasure);

        // Classification
        $itemDetailsNode->addChild('Classification', $this->unspscClassification)
            ->addAttribute('domain', $this->unspscClassificationDomain);

        // Classification
        /*$itemDetailsNode->addChild('Classification', $this->eclassClassification)
            ->addAttribute('domain', $this->eclassClassificationDomain);*/

        // Manufacturer
        $itemDetailsNode->addChild('ManufacturerPartID', $this->manufacturerPartId);
        $itemDetailsNode->addChild('ManufacturerName', $this->manufacturerName);

        // Image
        // $itemDetailsNode->addChild('Extrinsic', $this->image)
            // ->addAttribute('name', 'image');

        // LeadTime
        if ($this->leadTime !== null) {
            $itemDetailsNode->addChild('LeadTime', $this->leadTime);
        }

        //Taxes
        foreach ($this->taxes as $tax) {
            $tax->render($node, $currency, $locale);
        }
    }

    public function parse(\SimpleXMLElement $requestNode): void
    {
        $this->quantity = $this->floatvalue($requestNode->attributes()->quantity);
        $this->supplierPartId = (string)$requestNode->xpath('ItemID/SupplierPartID')[0];
        $this->supplierPartAuxiliaryId = (string)$requestNode->xpath('ItemID/SupplierPartAuxiliaryID')[0];
        $this->unitPrice = $this->floatvalue($requestNode->xpath('ItemDetail/UnitPrice/Money')[0]);
        $this->unitOfMeasure = (string)$requestNode->xpath('ItemDetail/UnitOfMeasure')[0];
        $this->requestedDeliveryDate = (string)$requestNode->attributes()->requestedDeliveryDate;
        $extrinsics = $requestNode->xpath('ItemDetail/Extrinsic');

        $name = 'Requester';
        $extrinsicFiltr = array_filter($extrinsics, function($e) use ($name) {
            return $e->attributes()->name == $name;
        });
        if (!empty($extrinsicFiltr)) {
            $this->requester = $extrinsics[array_key_first($extrinsicFiltr)];
        }
    
    }

    private function formatPrice(float $price)
    {
        return number_format($price, 2, '.', '');
    }

    public function getLeadTime(): ?int
    {
        return $this->leadTime;
    }

    public function setLeadTime(?int $leadTime): self
    {
        $this->leadTime = $leadTime;
        return $this;
    }

    public function floatvalue($val){
        // per verificare se l'importo ha decimali o no splitto l'importo e controllo il secondo elemento se ha più di due caratteri, dopo di che rimuovo la virgola dal valore
        $valArray = explode(',', $val);
        if (!empty($valArray) && !empty($valArray[1]) && strlen($valArray[1]) > 2) {
            $val = str_replace(",","",$val);
        }
        $val = str_replace(",",".",$val);
        $val = preg_replace('/\.(?=.*\.)/', '', $val);
        return floatval($val);
    }
}
