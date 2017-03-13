<?php

namespace Ups;

use DOMDocument;
use Exception;
use Psr\Log\LoggerInterface;
use SimpleXMLElement;
use Ups\Entity\DangerousGoods\AcceptanceAuditPreCheckRequest;
use Ups\Entity\Tradeability\LandedCostRequest;

/**
 * Tradeability API Wrapper.
 *
 * @author Stefan Doorn <stefan@efectos.nl>
 */
class DangerousGoods extends Ups
{

    /**
     *
     */
    const ENDPOINT_DANGEROUS_GOODS_UTILITY = '/DangerousGoodsUtility';

    /**
     * @var string
     *
     * @deprecated
     */
    protected $productionBaseUrl = 'https://www.ups.com/webservices';

    /**
     * @var string
     *
     * @deprecated
     */
    protected $integrationBaseUrl = 'https://wwwcie.ups.com/webservices';

    /**
     * @var
     */
    private $request;

    /**
     * @param string|null $accessKey UPS License Access Key
     * @param string|null $userId UPS User ID
     * @param string|null $password UPS User Password
     * @param bool $useIntegration Determine if we should use production or CIE URLs.
     * @param RequestInterface|null $request
     * @param LoggerInterface|null $logger PSR3 compatible logger (optional)
     */
    public function __construct(
        $accessKey = null,
        $userId = null,
        $password = null,
        $useIntegration = false,
        RequestInterface $request = null,
        LoggerInterface $logger = null
    ) {
        if (null !== $request) {
            $this->setRequest($request);
        }
        parent::__construct($accessKey, $userId, $password, $useIntegration, $logger);
    }

    /**
     * @param LandedCostRequest $request
     * @return SimpleXmlElement
     * @throws Exception
     */
    public function getAuditPreCheck(AcceptanceAuditPreCheckRequest $request)
    {
        $request = $this->createRequestAcceptanceAuditPreCheck($request);

        $response = $this->sendRequest(
            $request, self::ENDPOINT_DANGEROUS_GOODS_UTILITY,
            'ProcessAcceptanceAuditPreCheck', 'DangerousGoodsUtility'
        );

        dd($request, $response);

        if (isset($response->LandedCostResponse->QueryResponse)) {
            return $response->LandedCostResponse->QueryResponse;
        }

        return $response->LandedCostResponse->EstimateResponse;
    }

    /**
     * Create the LandedCostRequest request.
     *
     * @param LandedCostRequest $landedCostRequest The request details. Refer to the UPS documentation for available structure
     *
     * @return string
     */
    private function createRequestAcceptanceAuditPreCheck(AcceptanceAuditPreCheckRequest $acceptanceAuditPreCheckRequest)
    {
        $xml = new DOMDocument();
        $xml->formatOutput = true;

        $preAuditRequest = $xml->appendChild($xml->createElement('AcceptanceAuditPreCheckRequest'));
        $preAuditRequest->setAttribute('xml:lang', 'en-US');

        $request = $preAuditRequest->appendChild($xml->createElement('Request'));
        $request->appendChild($xml->importNode($this->createTransactionNode(), true));

        $preAuditRequest->appendChild($acceptanceAuditPreCheckRequest->getShipment()->toNode($xml));

        return $xml->saveXML();
    }

    /**
     * Creates and sends a request for the given data. Most errors are handled in SoapRequest
     *
     * @param $request
     * @param $endpoint
     * @param $operation
     * @param $wsdl
     *
     * @throws Exception
     *
     * @return TimeInTransitRequest
     */
    private function sendRequest($request, $endpoint, $operation, $wsdl)
    {
        $endpointurl = $this->compileEndpointUrl($endpoint);
        $this->response = $this->getRequest()->request(
            $this->createAccess(), $request, $endpointurl, $operation, $wsdl
        );
        $response = $this->response->getResponse();

        if (null === $response) {
            throw new Exception('Failure (0): Unknown error', 0);
        }

        return $this->formatResponse($response);
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        if (null === $this->request) {
            $this->request = new SoapRequest($this->logger);
        }

        return $this->request;
    }

    /**
     * @param RequestInterface $request
     *
     * @return $this
     */
    public function setRequest(RequestInterface $request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Format the response.
     *
     * @param SimpleXMLElement $response
     *
     * @return \stdClass
     */
    private function formatResponse(SimpleXMLElement $response)
    {
        return $this->convertXmlObject($response->Body);
    }
}
