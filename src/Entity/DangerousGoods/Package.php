<?php

namespace Ups\Entity\DangerousGoods;

use DOMDocument;
use DOMElement;
use Ups\Entity\PackageWeight;
use Ups\NodeInterface;

class Package implements NodeInterface
{

    const TRANSPORTATION_MODE_GND = 'GND';
    const TRANSPORTATION_MODE_CAO = 'CAO';
    const TRANSPORTATION_MODE_PAX = 'PAX';

    /**
     * @var PackageWeight
     */
    private $packageWeight;

    /**
     * @var string
     */
    private $packageIdentifier;

    /**
     * @var string
     */
    private $qValue;

    /**
     * @var bool
     */
    private $overPackedIndicator;

    /**
     * @var string
     */
    private $transportationMode;

    /**
     * @var string
     */
    private $emergencyPhone;

    /**
     * @var string
     */
    private $emergencyContact;

    /**
     * @var array|ChemicalRecord[]
     */
    private $chemicalRecords = [];

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

        $node = $document->createElement('Package');

        // Then the required values
        $node->appendChild($this->getPackageWeight()->toNode($document));
        $node->appendChild($document->createElement('PackageIdentifier', $this->getPackageIdentifier()));

        // Then the optional values
        if ($this->getQValue() !== null) {
            $node->appendChild($document->createElement('QValue', $this->getQValue()));
        }
        if ($this->isOverPackedIndicator()) {
            $node->appendChild($document->createElement('OverPackedIndicator'));
        }
        if ($this->getTransportationMode() !== null) {
            $node->appendChild($document->createElement('TransportationMode', $this->getTransportationMode()));
        }

        // Optional but with some requirements
        if ($this->getEmergencyPhone() !== null || $this->getEmergencyContact() !== null) {
            $node->appendChild($document->createElement('EmergencyPhone', $this->getEmergencyPhone()));
            $node->appendChild($document->createElement('EmergencyContact', $this->getEmergencyContact()));
        }

        // Add chemical records
        foreach($this->chemicalRecords as $chemicalRecord) {
            $node->appendChild($chemicalRecord->toNode($document));
        }

        // Return created node
        return $node;
    }

    /**
     * @return PackageWeight
     */
    public function getPackageWeight()
    {
        return $this->packageWeight;
    }

    /**
     * @param PackageWeight $packageWeight
     */
    public function setPackageWeight($packageWeight)
    {
        $this->packageWeight = $packageWeight;
    }

    /**
     * @return string
     */
    public function getQValue()
    {
        return $this->qValue;
    }

    /**
     * @param string $qValue
     */
    public function setQValue($qValue)
    {
        $this->qValue = $qValue;
    }

    /**
     * @return bool
     */
    public function isOverPackedIndicator()
    {
        return $this->overPackedIndicator;
    }

    /**
     * @param bool $overPackedIndicator
     */
    public function setOverPackedIndicator($overPackedIndicator)
    {
        $this->overPackedIndicator = $overPackedIndicator;
    }

    /**
     * @return string
     */
    public function getTransportationMode()
    {
        return $this->transportationMode;
    }

    /**
     * @param string $transportationMode
     */
    public function setTransportationMode($transportationMode)
    {
        $this->transportationMode = $transportationMode;
    }

    /**
     * @return string
     */
    public function getEmergencyPhone()
    {
        return $this->emergencyPhone;
    }

    /**
     * @param string $emergencyPhone
     */
    public function setEmergencyPhone($emergencyPhone)
    {
        $this->emergencyPhone = $emergencyPhone;
    }

    /**
     * @return string
     */
    public function getEmergencyContact()
    {
        return $this->emergencyContact;
    }

    /**
     * @param string $emergencyContact
     */
    public function setEmergencyContact($emergencyContact)
    {
        $this->emergencyContact = $emergencyContact;
    }

    /**
     * @return array|ChemicalRecord[]
     */
    public function getChemicalRecords()
    {
        return $this->chemicalRecords;
    }

    /**
     * @param array|ChemicalRecord[] $chemicalRecords
     */
    public function setChemicalRecords($chemicalRecords)
    {
        $this->chemicalRecords = $chemicalRecords;
    }

    /**
     * @param ChemicalRecord $chemicalRecord
     */
    public function addChemicalRecord(ChemicalRecord $chemicalRecord)
    {
        $this->chemicalRecords[] = $chemicalRecord;
    }

    /**
     * @return string
     */
    public function getPackageIdentifier()
    {
        return $this->packageIdentifier;
    }

    /**
     * @param string $packageIdentifier
     */
    public function setPackageIdentifier($packageIdentifier)
    {
        $this->packageIdentifier = $packageIdentifier;
    }
}
