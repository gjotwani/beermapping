<?php
namespace Tests\Response\GoogleGeoCodeClientResponse;

use \Response\GoogleGeoCodeClientResponse\GoogleGeoCodeClientResponse;

class GoogleGeoCodeClientResponseTest extends \PHPUnit_Framework_TestCase
{
    public static $googleGeoCodeClientResponse;

    public static function setUpBeforeClass()
    {
        $rawGoogleGeoCodeClientResponse = file_get_contents(__DIR__ . "/../../Fixtures/GoogleGeoCodeClientResponse.json");
        self :: $googleGeoCodeClientResponse = new GoogleGeoCodeClientResponse($rawGoogleGeoCodeClientResponse);
    }

    /**
     * Test BeerMapClient Type
     */
    public function testResponseType()
    {
        $this->assertEquals(
            get_class(self :: $googleGeoCodeClientResponse), 'Response\GoogleGeoCodeClientResponse\GoogleGeoCodeClientResponse',
            'Client isnt of expected type \Response\GoogleGeoCodeClientResponse\GoogleGeoCodeClientResponse'
        );

    }

    /**
     * Test BeerMapClient Type
     */
    public function testgetGeoLocation()
    {
        $geoLocationInfo = self :: $googleGeoCodeClientResponse->getGeoLocation();
        $this->assertEquals(3, count($geoLocationInfo));
        $this->assertEquals(38.8077552, $geoLocationInfo['latitude']);
        $this->assertEquals(-77.0860138, $geoLocationInfo['longitude']);
        $this->assertEquals(
            '3212 Duke Street, Alexandria, VA 22314, USA',
            $geoLocationInfo['formatted_address']
        );
    }
}
