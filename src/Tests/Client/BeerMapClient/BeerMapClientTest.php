<?php
namespace Tests\Client\BeerMapClient;

use Client\BeerMapClient\BeerMapClient;
use Response\BeerMapResponse;

class BeerMapClientTest extends BeerMapClientBaseTest
{

    public static function setUpBeforeClass()
    {
        parent :: setUpBeforeClass();
    }

    /**
     * Test BeerMapClient Type
     */
    public function testClientType()
    {
        $this->assertEquals(
            get_class(self :: $client), 'Client\BeerMapClient\BeerMapClient',
            'Client isnt of expected type Client\BeerMapClient\BeerMapClient'
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
            'Unexpeected api key'
        );

        $this->assertEquals(
            self :: $client->apiUrl,
            'http://beermapping.com/webservice/loccity',
            'Unexpeected api start url'
        );
    }

    /**
     * Test Client setLocation()
     */
    public function testSetLocation()
    {
        $location = '3212 duke street';
        self :: $client->setLocation($location);
        $this->assertEquals(
            self :: $client->locationNameQuery,
            $location,
            'Unexpeected location query'
        );
    }

    /**
     * Test Client getRequestUrl()
     */
    public function testgetRequestUrl()
    {
        $this->assertEquals(
            self :: $client->getRequestUrl(),
            'http://beermapping.com/webservice/loccity/not-my-api-key/3212+duke+street',
            'Unexpeected request url'
        );
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
}
