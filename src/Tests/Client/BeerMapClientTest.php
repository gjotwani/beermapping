<?php
require_once '../../../vendor/autoload.php';

use Client\BeerMapClient\BeerMapClient;

class BeerMapClientTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test BeerMapClient init
     */
    public function testClientInit()
    {
        $client = new BeerMapClient(
            $apiKey = 'not-my-api-key',
            $apiUrl = 'http://beermapping.com/webservice/loccity'
        );
    }
}
