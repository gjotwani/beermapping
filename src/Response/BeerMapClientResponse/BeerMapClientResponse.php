<?php

namespace Response\BeerMapClientResponse;

class BeerMapClientResponse
{
    private $rawResponse;
    private $geoCodeClient;

    public function __construct($rawResponse, $geoCodeClient = false)
    {
        $this->rawResponse = $rawResponse;
        $this->geoCodeClient = $geoCodeClient;
    }

    public function setGeoCodeClient($geoCodeClient)
    {
        $this->geoCodeClient = $geoCodeClient;
    }

    public function getLocationGeoCodeParams()
    {
        return array('street', 'city', 'state', 'zip', 'country');
    }

    public function getBreweries()
    {
        return $this->getProcessedResponse();
    }

    public function getProcessedResponse()
    {
        $this->xmlDomDoc = new \DOMDocument('1.0');
        $this->xmlDomDoc->formatOutput = true;
        $this->xmlDomDoc->preserveWhiteSpace = false;
        $this->xmlDomDoc->loadXML($this->rawResponse);

        $processedLocations = array();

        $locationGeoCodeParams = $this->getLocationGeoCodeParams();

        //http://stackoverflow.com/questions/5882433/how-get-first-level-of-dom-elements-by-domdocument-php
        if ($this->xmlDomDoc->hasChildNodes()) {

            $rootChildren = $this->xmlDomDoc->childNodes;
            $bmp_locations = $rootChildren->item(0);

            $bmp_locations->hasChildNodes();
            $locations = $bmp_locations->childNodes;

            foreach ($locations as $location) {
                $locationNameQuery = null;
                $processedLocation = array();
                $locationAttributes = $location->childNodes;

                foreach ($location->childNodes as $childNode) {

                    $processedLocation[$childNode->nodeName] = $childNode->nodeValue;

                    if (in_array($childNode->nodeName, $locationGeoCodeParams)) {
                        $locationNameQuery.= ' '.$childNode->nodeValue;
                    }

                }

                if (method_exists($this->geoCodeClient, 'getGeoLocation')) {
                    $this->processGeoCodeInfo($locationNameQuery, $processedLocation);
                }

                $processedLocations[] = $processedLocation;
            }
        }

        return $processedLocations;
    }

    public function processGeoCodeInfo($locationNameQuery, &$processedLocation)
    {
        $this->geoCodeClient->setLocation($locationNameQuery);
        $geoCodeLocation = $this->geoCodeClient->getGeoLocation();

        if (isset($geoCodeLocation['latitude']) && isset($geoCodeLocation['longitude'])) {
            $processedLocation['latitude'] = $geoCodeLocation['latitude'];
            $processedLocation['longitude'] = $geoCodeLocation['longitude'];
        }
    }

    public function __toString()
    {
        header('Content-Type: application/json');
        $locations = $this->getBreweries();
        return json_encode($locations);
    }

}
