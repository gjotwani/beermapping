<?php

/**
 * An example of using
 * clients and getting responses
 * for location queries
 */
require_once 'vendor//autoload.php';
use Client\ApiClient;

$beerMapClient = ApiClient :: getClient("BeerMapClient");
$googleGeoCodeClient = ApiClient :: getClient("GoogleGeoCodeClient");

$beerMapClient->setApiKey('71515667a86b8ec7f58cd22e3af86f6e')
    ->setApiUrl('http://beermapping.com/webservice/loccity')
    ->setLocation('Los Angeles');

$googleGeoCodeClient->setApiUrl('http://maps.googleapis.com/maps/api/geocode/json');
$beerMapClient->setGeoCodeClient($googleGeoCodeClient);

//Raw array of Brewery Listings
//$beerMapClient->getResponse()->asArray();

//Json formatted Brewery Listings
echo $beerMapClient->getResponse()->asJson();
