<?php
require_once '../../../vendor/autoload.php';

use Client\BeerMapClient\BeerMapClient;

class BeerMapClientTest extends \PHPUnit_Framework_TestCase
{
    public static $client;

    public static function setUpBeforeClass()
    {
        self :: $client = new BeerMapClient(
            $apiKey = 'not-my-api-key',
            $apiUrl = 'http://beermapping.com/webservice/loccity'
        );
    }

    /**
     * Test BeerMapClient Type
     */
    public function testClientType()
    {
        $this->assertTrue(
            self :: $client instanceof Client\BeerMapClient\BeerMapClient,
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
}
