<?php
namespace Client\GoogleGeoCodeClient;

interface GoogleGeoCodeClientInterface
{
    /**
     * Setter for
     * location query
     *
     * @param string $locationNameQuery
     */
    public function setLocation($locationNameQuery);

    public function getGeoLocation();

    public function __get($name);

    public function getRequestUrl();
}
