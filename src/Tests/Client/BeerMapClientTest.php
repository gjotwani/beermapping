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
     * Test BeerMapClient init
     */
    public function testClientInit()
    {
        $this->assertTrue(
            self :: $client instanceof Client\BeerMapClient\BeerMapClient,
            'Client isnt of expected type Client\BeerMapClient\BeerMapClient'
        );
    }
}
