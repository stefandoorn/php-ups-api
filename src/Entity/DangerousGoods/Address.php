<?php

namespace Ups\Entity\DangerousGoods;

use DOMDocument;
use DOMElement;

/**
 * Class Address
 * @package Ups\Entity\DangerousGoods
 */
abstract class Address
{

    /**
     * @var string
     */
    private $addressLine;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $stateProvinceCode;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @param DOMElement $node
     * @param DOMDocument $document
     * @return DOMElement
     */
    public function createElement(DomElement $node, DOMDocument $document)
    {
        if ($this->getAddressLine()) {
            $node->appendChild($document->createElement('AddressLine', $this->getAddressLine()));
        }
        if ($this->getCity()) {
            $node->appendChild($document->createElement('City', $this->getCity()));
        }
        if ($this->getStateProvinceCode()) {
            $node->appendChild($document->createElement('StateProvinceCode', $this->getStateProvinceCode()));
        }
        if ($this->getPostalCode()) {
            $node->appendChild($document->createElement('PostalCode', $this->getPostalCode()));
        }
        if ($this->getCountryCode()) {
            $node->appendChild($document->createElement('CountryCode', $this->getCountryCode()));
        }

        return $node;
    }

    /**
     * @return string
     */
    public function getAddressLine()
    {
        return $this->addressLine;
    }

    /**
     * @param string $addressLine
     */
    public function setAddressLine($addressLine)
    {
        $this->addressLine = $addressLine;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getStateProvinceCode()
    {
        return $this->stateProvinceCode;
    }

    /**
     * @param string $stateProvinceCode
     */
    public function setStateProvinceCode($stateProvinceCode)
    {
        $this->stateProvinceCode = $stateProvinceCode;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }
}
