<?php

namespace Ups\Entity\DangerousGoods;

use Ups\NodeInterface;
use DOMDocument;

class ShipToAddress extends Address implements NodeInterface
{

    public function toNode(DOMDocument $document = null)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('ShipToAddress');

        return parent::createElement($node, $document);
    }
}
