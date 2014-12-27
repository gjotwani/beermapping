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
    private $apiKey;

    private $apiUrl;

    private $locationNameQuery;

    public function __construct($apiKey, $apiUrl)
    {
        $this->apiKey = $apiKey;
        $this->apiUrl = $apiUrl;
    }

    public function __get($name)
    {
        return property_exists(__CLASS__, $name) ? $this->{$name} : false;
    }

    public function setLocation($locationNameQuery)
    {
        $this->locationNameQuery = $locationNameQuery;
    }

    public function getResponse()
    {
        $rawResponse = $this->getRawResponse();
        $responseObject = new BeerMapResponse($rawResponse);
        return $responseObject;
    }

    public function getRequestUrl()
    {
        return trim($this->apiUrl . '/' . $this->apiKey . '/' . urlencode($this->locationNameQuery));
    }

    public function getRawResponse()
    {
        $requestUrl = $this->getRequestUrl();
        $rawResponse = file_get_contents($requestUrl);
        return $rawResponse;
    }
}
