<?php
namespace Client\GoogleGeoCodeClient;
use \Response\GoogleGeoCodeClientResponse\GoogleGeoCodeClientResponse;

use \Client\ApiClient;

class GoogleGeoCodeClient extends ApiClient implements GoogleGeoCodeClientInterface
{

    private $wt = 'json';

    private $location;

    public function setLocation($locationNameQuery)
    {
        $this->location = $locationNameQuery;
    }

    public function getGeoLocation()
    {
        $requestUrl = $this->getRequestUrl();
        $rawResponse = $this->getRawResponse($requestUrl);
        $responseObject = new GoogleGeoCodeClientResponse($rawResponse);
        return $responseObject->getGeoLocation();
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

    public function getRequestUrl()
    {
        return $this->apiUrl . '' . $this->writer . '?address=' . urlencode($this->location);
    }

}
