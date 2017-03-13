<?php

namespace Ups\Entity\DangerousGoods;

use Ups\Entity\DangerousGoods\Shipment;
use Ups\NodeInterface;
use DOMDocument;

/**
 * Class AcceptanceAuditPreCheckRequest
 * @package Ups\Entity\DangerousGoods
 */
class AcceptanceAuditPreCheckRequest implements NodeInterface
{

    /**
     * @var Shipment
     */
    private $shipment;

    /**
     * @param DOMDocument|null $document
     * @return \DOMElement
     */
    public function toNode(DOMDocument $document = null)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('AcceptanceAuditPreCheckRequest');

        // Then the required values
        $node->appendChild($this->getShipment()->toNode($document));

        return $node;
    }

    /**
     * @return Shipment
     */
    public function getShipment()
    {
        return $this->shipment;
    }

    /**
     * @param Shipment $shipment
     */
    public function setShipment($shipment)
    {
        $this->shipment = $shipment;
    }
}
