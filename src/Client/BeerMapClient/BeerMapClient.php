<?php

/**
 * A class that allows setting beermap request params
 * and fetching a response from Beermap api
 *
 * @author Gaurav Jotwani <grjotwani@gmail.com>
 */

namespace Client\BeerMapClient;

use \Client\ApiClient;
use \Response\BeerMapClientResponse\BeerMapClientResponse;

class BeerMapClient extends ApiClient implements BeerMapClientInterface
{
    /**
     * Url entered location query
     *
     * @var string
     */
    private $locationNameQuery;

    private $geoCodeClient;

    /**
     * Setter for
     * location query
     *
     * @param string $locationNameQuery
     */
    public function setLocation($locationNameQuery)
    {
        $this->locationNameQuery = $locationNameQuery;
    }

    /**
     * Execute a search and
     * get a response object
     *
     * @return BeerMapResponse BeerMapApi response object
     */
    public function getResponse()
    {
        $requestUrl = $this->getRequestUrl();
        $rawResponse = $this->getRawResponse($requestUrl);
        $responseObject = new BeerMapClientResponse($rawResponse, $this->locationNameQuery, $this->geoCodeClient);

        return $responseObject;
    }

    public function setGeoCodeClient($geoCodeClient)
    {
        $this->geoCodeClient = $geoCodeClient;
    }

    /**
     * Magic getter
     * for class properties
     *
     * @param string $name property name
     * @return mixed property value
     */
    public function __get($name)
    {
        return property_exists(get_class($this), $name) ? $this->{$name} : false;
    }

    /**
     * @return string url for request
     */
    public function getRequestUrl()
    {
        return trim($this->apiUrl . '/' . $this->apiKey . '/' . urlencode($this->locationNameQuery));
    }
}
