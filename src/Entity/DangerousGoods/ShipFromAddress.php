<?php

namespace Ups\Entity\DangerousGoods;

use Ups\NodeInterface;
use DOMElement;
use DOMDocument;

class ShipFromAddress extends Address implements NodeInterface
{


    public function toNode(DOMDocument $document = null)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('ShipFromAddress');

        return parent::createElement($node, $document);
    }

}
