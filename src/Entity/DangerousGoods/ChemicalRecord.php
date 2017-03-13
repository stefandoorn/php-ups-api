<?php

namespace Ups\Entity\DangerousGoods;

use DomDocument;
use DomElement;
use Ups\Entity\Service;
use Ups\NodeInterface;

/**
 * Class ChemicalRecord
 * @package Ups\Entity\DangerousGoods
 */
class ChemicalRecord implements NodeInterface
{

    /**
     * @var string
     */
    private $reportableQuantity;

    /**
     * @var string
     */
    private $classDivisionNumber;

    /**
     * @var string
     */
    private $subRiskClass;

    /**
     * @var string
     */
    private $idNumber;

    /**
     * @var string
     */
    private $packagingGroupType;

    /**
     * @var string
     */
    private $quantity;

    /**
     * @var string
     */
    private $uom;

    /**
     * @var string
     */
    private $packagingInstructionCode;

    /**
     * @var string
     */
    private $properShippingName;

    /**
     * @var string
     */
    private $technicalName;

    /**
     * @var string
     */
    private $additionalDescription;

    /**
     * @var string
     */
    private $packagingType;

    /**
     * @var string
     */
    private $hazardLabelRequired;

    /**
     * @var string
     */
    private $packagingTypeQuantity;

    /**
     * @required
     * @var string
     */
    private $commodityRegulatedLevelCode;

    /**
     * @var string
     */
    private $transportCategory;

    /**
     * @var string
     */
    private $tunnelRestrictionCode;

    /**
     * @var bool
     */
    private $allPackedInOneIndicator;

    /**
     * @param null|DOMDocument $document
     *
     * @return DOMElement
     */
    public function toNode(DOMDocument $document = null)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('Shipment');

        // Then the required values
        $node->appendChild($document->createElement('CommodityRegulatedLevelCode', $this->getCommodityRegulatedLevelCode));


        // Then the optional values
        if ($this->getReportableQuantity() !== null) {
            $node->appendChild($document->createElement('ReportableQuantity', $this->getReportableQuantity()));
        }
        if ($this->getClassDivisionNumber() !== null) {
            $node->appendChild($document->createElement('ClassDivisionNumber', $this->getClassDivisionNumber()));
        }
        if ($this->getSubRiskClass() !== null) {
            $node->appendChild($document->createElement('SubRiskClass', $this->getSubRiskClass()));
        }
        if ($this->getIdNumber() !== null) {
            $node->appendChild($document->createElement('IDNumber', $this->getIdNumber()));
        }
        if ($this->getPackagingGroupType() !== null) {
            $node->appendChild($document->createElement('PackagingGroupType', $this->getPackagingGroupType()));
        }
        if ($this->getQuantity() !== null) {
            $node->appendChild($document->createElement('Quantity', $this->getQuantity()));
        }
        if ($this->getUom() !== null) {
            $node->appendChild($document->createElement('UOM', $this->getUom()));
        }
        if ($this->getPackagingInstructionCode() !== null) {
            $node->appendChild($document->createElement('PackagingInstructionCode', $this->getPackagingInstructionCode()));
        }
        if ($this->getProperShippingName() !== null) {
            $node->appendChild($document->createElement('ProperShippingName', $this->getProperShippingName()));
        }
        if ($this->getTechnicalName() !== null) {
            $node->appendChild($document->createElement('TechnicalName', $this->getTechnicalName()));
        }
        if ($this->getAdditionalDescription() !== null) {
            $node->appendChild($document->createElement('AdditionalDescription', $this->getAdditionalDescription()));
        }
        if ($this->getPackagingType() !== null) {
            $node->appendChild($document->createElement('PackagingType', $this->getPackagingType()));
        }
        if ($this->getHazardLabelRequired() !== null) {
            $node->appendChild($document->createElement('HazardLabelRequired', $this->getHazardLabelRequired()));
        }
        if ($this->getPackagingTypeQuantity() !== null) {
            $node->appendChild($document->createElement('PackagingTypeQuantity', $this->getPackagingTypeQuantity()));
        }
        if ($this->getTransportCategory() !== null) {
            $node->appendChild($document->createElement('TransportCategory', $this->getTransportCategory()));
        }
        if ($this->getTunnelRestrictionCode() !== null) {
            $node->appendChild($document->createElement('TunnelRestrictionCode', $this->getTunnelRestrictionCode()));
        }
        if ($this->isAllPackedInOneIndicator() !== null) {
            $node->appendChild($document->createElement('AllPackedInOneIndicator'));
        }

        // Return created node
        return $node;
    }

    /**
     * @return string
     */
    public function getReportableQuantity()
    {
        return $this->reportableQuantity;
    }

    /**
     * @param string $reportableQuantity
     */
    public function setReportableQuantity($reportableQuantity)
    {
        $this->reportableQuantity = $reportableQuantity;
    }

    /**
     * @return string
     */
    public function getClassDivisionNumber()
    {
        return $this->classDivisionNumber;
    }

    /**
     * @param string $classDivisionNumber
     */
    public function setClassDivisionNumber($classDivisionNumber)
    {
        $this->classDivisionNumber = $classDivisionNumber;
    }

    /**
     * @return string
     */
    public function getSubRiskClass()
    {
        return $this->subRiskClass;
    }

    /**
     * @param string $subRiskClass
     */
    public function setSubRiskClass($subRiskClass)
    {
        $this->subRiskClass = $subRiskClass;
    }

    /**
     * @return string
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * @param string $idNumber
     */
    public function setIdNumber($idNumber)
    {
        $this->idNumber = $idNumber;
    }

    /**
     * @return string
     */
    public function getPackagingGroupType()
    {
        return $this->packagingGroupType;
    }

    /**
     * @param string $packagingGroupType
     */
    public function setPackagingGroupType($packagingGroupType)
    {
        $this->packagingGroupType = $packagingGroupType;
    }

    /**
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getUom()
    {
        return $this->uom;
    }

    /**
     * @param string $uom
     */
    public function setUom($uom)
    {
        $this->uom = $uom;
    }

    /**
     * @return string
     */
    public function getPackagingInstructionCode()
    {
        return $this->packagingInstructionCode;
    }

    /**
     * @param string $packagingInstructionCode
     */
    public function setPackagingInstructionCode($packagingInstructionCode)
    {
        $this->packagingInstructionCode = $packagingInstructionCode;
    }

    /**
     * @return string
     */
    public function getProperShippingName()
    {
        return $this->properShippingName;
    }

    /**
     * @param string $properShippingName
     */
    public function setProperShippingName($properShippingName)
    {
        $this->properShippingName = $properShippingName;
    }

    /**
     * @return string
     */
    public function getTechnicalName()
    {
        return $this->technicalName;
    }

    /**
     * @param string $technicalName
     */
    public function setTechnicalName($technicalName)
    {
        $this->technicalName = $technicalName;
    }

    /**
     * @return string
     */
    public function getAdditionalDescription()
    {
        return $this->additionalDescription;
    }

    /**
     * @param string $additionalDescription
     */
    public function setAdditionalDescription($additionalDescription)
    {
        $this->additionalDescription = $additionalDescription;
    }

    /**
     * @return string
     */
    public function getPackagingType()
    {
        return $this->packagingType;
    }

    /**
     * @param string $packagingType
     */
    public function setPackagingType($packagingType)
    {
        $this->packagingType = $packagingType;
    }

    /**
     * @return string
     */
    public function getHazardLabelRequired()
    {
        return $this->hazardLabelRequired;
    }

    /**
     * @param string $hazardLabelRequired
     */
    public function setHazardLabelRequired($hazardLabelRequired)
    {
        $this->hazardLabelRequired = $hazardLabelRequired;
    }

    /**
     * @return string
     */
    public function getPackagingTypeQuantity()
    {
        return $this->packagingTypeQuantity;
    }

    /**
     * @param string $packagingTypeQuantity
     */
    public function setPackagingTypeQuantity($packagingTypeQuantity)
    {
        $this->packagingTypeQuantity = $packagingTypeQuantity;
    }

    /**
     * @return string
     */
    public function getCommodityRegulatedLevelCode()
    {
        return $this->commodityRegulatedLevelCode;
    }

    /**
     * @param string $commodityRegulatedLevelCode
     */
    public function setCommodityRegulatedLevelCode($commodityRegulatedLevelCode)
    {
        $this->commodityRegulatedLevelCode = $commodityRegulatedLevelCode;
    }

    /**
     * @return string
     */
    public function getTransportCategory()
    {
        return $this->transportCategory;
    }

    /**
     * @param string $transportCategory
     */
    public function setTransportCategory($transportCategory)
    {
        $this->transportCategory = $transportCategory;
    }

    /**
     * @return string
     */
    public function getTunnelRestrictionCode()
    {
        return $this->tunnelRestrictionCode;
    }

    /**
     * @param string $tunnelRestrictionCode
     */
    public function setTunnelRestrictionCode($tunnelRestrictionCode)
    {
        $this->tunnelRestrictionCode = $tunnelRestrictionCode;
    }

    /**
     * @return bool
     */
    public function isAllPackedInOneIndicator()
    {
        return $this->allPackedInOneIndicator;
    }

    /**
     * @param bool $allPackedInOneIndicator
     */
    public function setAllPackedInOneIndicator($allPackedInOneIndicator)
    {
        $this->allPackedInOneIndicator = $allPackedInOneIndicator;
    }
}
