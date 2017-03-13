<?php

namespace Ups\Entity\DangerousGoods;

use DomDocument;
use DomElement;
use Ups\Entity\Service;
use Ups\NodeInterface;

/**
 * Class Shipment
 * @package Ups\Entity\DangerousGoods
 */
class Shipment implements NodeInterface
{

    /**
     * @var ShipToAddress
     */
    private $shipToAddress;

    /**
     * @var ShipFromAddress
     */
    private $shipFromAddress;

    /**
     * @var Service
     */
    private $service;

    /**
     * @var string
     */
    private $regulationSet;

    /**
     * @var array|Package[]
     */
    private $packages = [];

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
        $node->appendChild($this->getShipFromAddress()->toNode($document));
        $node->appendChild($this->getShipToAddress()->toNode($document));
        $node->appendChild($this->getService()->toNode($document));

        // Then the optional values
        if ($this->getRegulationSet() !== null) {
            $node->appendChild($document->createElement('RegulationSet', $this->getRegulationSet()));
        }

        // Then packages array
        foreach ($this->packages as $package) {
            $node->appendChild($package->toNode($document));
        }

        // Return created node
        return $node;
    }

    /**
     * @return ShipToAddress
     */
    public function getShipToAddress()
    {
        return $this->shipToAddress;
    }

    /**
     * @param ShipToAddress $shipToAddress
     */
    public function setShipToAddress($shipToAddress)
    {
        $this->shipToAddress = $shipToAddress;
    }

    /**
     * @return ShipFromAddress
     */
    public function getShipFromAddress()
    {
        return $this->shipFromAddress;
    }

    /**
     * @param ShipFromAddress $shipFromAddress
     */
    public function setShipFromAddress($shipFromAddress)
    {
        $this->shipFromAddress = $shipFromAddress;
    }

    /**
     * @return Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param Service $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @return string
     */
    public function getRegulationSet()
    {
        return $this->regulationSet;
    }

    /**
     * @param string $regulationSet
     */
    public function setRegulationSet($regulationSet)
    {
        $this->regulationSet = $regulationSet;
    }
}
