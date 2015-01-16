<?php

/**
 * Test the Apiclient
 * & its ability to
 * to produce different
 * api client objects
 */

namespace Tests\Client;
use Client\ApiClient;

class ApiClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Client
     * factory returns
     * clients of
     * different types
     *
     * Test unknown client
     * @expectedException InvalidArgumentException
     */
    public function testApiClientFactory()
    {
        $googleGeoCodeClient = ApiClient :: getClient("unknown-client");
    }

    /**
     * Test Client
     * factory returns
     * GoogleGeoCodeClient
     */
    public function testApiClientFactory1()
    {
        $googleGeoCodeClient = ApiClient :: getClient("GoogleGeoCodeClient");

        $this->assertEquals("Client\GoogleGeoCodeClient\GoogleGeoCodeClient", get_class($googleGeoCodeClient));
    }

    /**
     * Test Client
     * factory returns
     * BeerMapClient
     */
    public function testApiClientFactory2()
    {
        $googleGeoCodeClient = ApiClient :: getClient("BeerMapClient");

        $this->assertEquals("Client\BeerMapClient\BeerMapClient", get_class($googleGeoCodeClient));
    }
}
