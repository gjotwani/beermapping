<?php

/**
 * A class that allows setting beermap request params
 * and fetching a response from Beermap api
 *
 * @author Gaurav Jotwani <grjotwani@gmail.com>
 */

namespace Client\BeerMapClient;

use Response\BeerMapResponse;

class BeerMapClient implements BeerMapClientInterface
{
    /**
     * Apikey for beermapping
     *
     * @var string
     */
    private $apiKey;

    /**
     * Start url for beermapping
     *
     * @var string
     */
    private $apiUrl;

    /**
     * Url entered location query
     *
     * @var string
     */
    private $locationNameQuery;

    public function __construct($apiKey, $apiUrl)
    {
        $this->apiKey = $apiKey;
        $this->apiUrl = $apiUrl;
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
        return property_exists(__CLASS__, $name) ? $this->{$name} : false;
    }

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
        $rawResponse = $this->getRawResponse();
        $responseObject = new BeerMapResponse($rawResponse);
        return $responseObject;
    }

    /**
     * @return string url for request
     */
    public function getRequestUrl()
    {
        return trim($this->apiUrl . '/' . $this->apiKey . '/' . urlencode($this->locationNameQuery));
    }

    /**
     * @return string raw api response
     */
    public function getRawResponse()
    {
        $requestUrl = $this->getRequestUrl();
        $rawResponse = file_get_contents($requestUrl);
        return $rawResponse;
    }
}
