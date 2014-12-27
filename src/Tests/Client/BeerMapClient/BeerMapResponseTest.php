<?php
namespace Tests\Client\BeerMapClient;

use Client\BeerMapClient\BeerMapClient;
use Response\BeerMapResponse;

class BeerMapResponseTest extends BeerMapClientBaseTest
{
    /**
     * Setup fixtures prior to tests
     */
    public static function setUpBeforeClass()
    {
        parent :: setUpBeforeClass();
    }

    /**
     * Test Client BeerMap response object
     */
    public function testBeerMapResponse()
    {
        $this->assertNotNull(self :: $beerMapResponseFixture);

        $this->assertEquals(
            get_class(self :: $beerMapResponse), 'Response\BeerMapResponse',
            'Response isnt of expected type Response\BeerMapResponse'
        );
    }

    /**
     * Test Client BeerMap response object
     */
    public function testGetLocations()
    {
        $this->assertGreaterThan(1, count(self :: $beerMapResponse->getLocations()));
    }
}
