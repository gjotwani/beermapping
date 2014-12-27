<?php
namespace Tests\Client\BeerMapClient;
use Client\BeerMapClient\BeerMapClient;
use Response\BeerMapResponse;

class BeerMapClientBaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Client fixture
     *
     * @var object
     */
    public static $client;

    /**
     * Raw response fixture
     * for a request
     *
     * @var string
     */
    public static $beerMapResponseFixture;

    /**
     * Response object
     *
     * @var object
     */
    public static $beerMapResponse;

    /**
     * Setup fixtures prior to tests
     */
    public static function setUpBeforeClass()
    {
        self :: $client = new BeerMapClient(
            $apiKey = 'not-my-api-key',
            $apiUrl = 'http://beermapping.com/webservice/loccity'
        );

        self :: $beerMapResponseFixture = file_get_contents(__DIR__ . "/../../Fixtures/BeerMapClientResponse.xml");
        self :: $beerMapResponse = new BeerMapResponse(self :: $beerMapResponseFixture);
    }

    public function testFixturesNotNull()
    {
        $this->assertNotNull(self :: $client);
        $this->assertNotNull(self :: $beerMapResponseFixture);
        $this->assertNotNull(self :: $beerMapResponse);
    }
}
