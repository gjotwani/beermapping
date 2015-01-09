<?php
namespace Tests\Client\GoogleGeoCodeClient;

use Client\GoogleGeoCodeClient\GoogleGeoCodeClient;
use Response\BeerMapResponse;

class GoogleGeoCodeClientTest extends GoogleGeoCodeClientBaseTest
{

    public static function setUpBeforeClass()
    {
        parent :: setUpBeforeClass();
    }

    /**
     * Test GoogleGeoCodeClient Type
     */
    public function testClientType()
    {
        $this->assertEquals(
            get_class(self :: $client), 'Client\GoogleGeoCodeClient\GoogleGeoCodeClient',
            'Client isnt of expected type Client\GoogleGeoCodeClient\GoogleGeoCodeClient'
        );
    }

    /**
     * Test Client params
     */
    public function testClientParams()
    {
        $this->assertEquals(
            self :: $client->apiKey,
            'not-my-api-key',
            'Unexpected api key'
        );

        $this->assertEquals(
            self :: $client->apiUrl,
            'http://maps.googleapis.com/maps/api/geocode/json',
            'Unexpected api start url'
        );
    }

    /**
     * Test Client setLocation()
     */
    public function testSetLocation()
    {
        $location = '4600 Queen Street Geneva 98213';
        self :: $client->setLocation($location);

        $this->assertEquals(
            self :: $client->location,
            $location,
            'Unexpected location query'
        );
    }

    /**
     * Test Client getRequestUrl()
     */
    public function testgetRequestUrl()
    {
        $this->assertEquals(
            self :: $client->getRequestUrl(),
            'http://maps.googleapis.com/maps/api/geocode/json?address=4600+Queen+Street+Geneva+98213',
            'Unexpected request url'
        );
    }

    /**
     * Test Client GoogleGeoCode response object
     */
    public function testGoogleGeoCodepResponse()
    {
        $this->assertNotNull(self :: $googleGeoCodeResponseFixture);

        $this->assertEquals(
            get_class(self :: $googleGeoCodeResponse), 'Response\GoogleGeoCodeClientResponse\GoogleGeoCodeClientResponse',
            'Response isnt of expected type Response\GoogleGeoCodeClientResponse\GoogleGeoCodeClientResponse'
        );
    }
}
