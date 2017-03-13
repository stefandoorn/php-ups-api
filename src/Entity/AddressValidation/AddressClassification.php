<?php namespace Ups\Entity\AddressValidation;

/**
 * Class AddressClassification
 * @package Ups\Entity\AddressValidation
 */
class AddressClassification
{
    /**
     * @var \SimpleXMLElement[]
     */
    public $code;

    /**
     * @var \SimpleXMLElement[]
     */
    public $description;

    /**
     * AddressClassification constructor.
     * @param \SimpleXMLElement $object
     */
    public function __construct(\SimpleXMLElement $object)
    {
        if ($object->count() == 0) {
            throw new \InvalidArgumentException(__METHOD__ . ': The passed object does not have any child nodes.');
        }

        $this->code = $object->Code;
        $this->description = $object->Description;
    }
}
