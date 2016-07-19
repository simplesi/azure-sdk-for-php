<?php

/**
 * Code generated by Microsoft (R) AutoRest Code Generator 0.17.0.0
 * Changes may cause incorrect behavior and will be lost if the code is
 * regenerated.
 *
 * PHP version: 5.5
 *
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     https://github.com/yaqiyang/php-sdk-dev/blob/master/LICENSE
 *
 * @link        https://github.com/Azure/azure-sdk-for-php
 *
 * @version     Release: 0.10.0_2016, API Version: 2015-06-01-preview
 */

namespace MicrosoftAzure\Arm\Commerce;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * RateCard.
 */
class RateCard
{
    /**
     * The service client object for the operations.
     *
     * @var UsageManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for RateCard.
     *
     * @param UsageManagementClient, Service client for RateCard
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Enables you to query for the resource/meter metadata and related prices
     * used in a given subscription by Offer ID, Currency, Locale and Region. The
     * metadata associated with the billing meters, including but not limited to
     * service names, types, resources, units of measure, and regions, is subject
     * to change at any time and without notice. If you intend to use this
     * billing data in an automated fashion, please use the billing meter GUID to
     * uniquely identify each billable item. If the billing meter GUID is
     * scheduled to change due to a new billing model, you will be notified in
     * advance of the change.
     *
     * @param array $filter The filter to apply on the operation. It ONLY supports the 'eq' and 'and'
     *  logical operators at this time. All the 4 query parameters 'OfferDurableId',  'Currency',
     *  'Locale', 'Region' are required to be a part of the $filter. 
     * <pre>
     * [
     *    'OfferDurableId' => 'requiredOfferDurableId',
     *    'Currency' => 'requiredCurrency',
     *    'Locale' => 'requiredLocale',
     *    'RegionInfo' => 'requiredRegionInfo'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'Currency' => '',
     *    'Locale' => '',
     *    'IsTaxIncluded' => 'false',
     *    'MeterRegion' => '',
     *    'Tags' => '',
     *    'OfferTerms' => '',
     *    'Meters' => ''
     * ];
     * </pre>
     */
    public function get(array $filter, array $customHeaders = [])
    {
        $response = $this->getAsync($filter, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Enables you to query for the resource/meter metadata and related prices
     * used in a given subscription by Offer ID, Currency, Locale and Region. The
     * metadata associated with the billing meters, including but not limited to
     * service names, types, resources, units of measure, and regions, is subject
     * to change at any time and without notice. If you intend to use this
     * billing data in an automated fashion, please use the billing meter GUID to
     * uniquely identify each billable item. If the billing meter GUID is
     * scheduled to change due to a new billing model, you will be notified in
     * advance of the change.
     *
     * @param array $filter The filter to apply on the operation. It ONLY supports the 'eq' and 'and'
     *  logical operators at this time. All the 4 query parameters 'OfferDurableId',  'Currency',
     *  'Locale', 'Region' are required to be a part of the $filter. 
     * <pre>
     * [
     *    'OfferDurableId' => 'requiredOfferDurableId',
     *    'Currency' => 'requiredCurrency',
     *    'Locale' => 'requiredLocale',
     *    'RegionInfo' => 'requiredRegionInfo'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync(array $filter, array $customHeaders = [])
    {
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.Commerce/RateCard';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['$filter' => $filter, 'api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }
}