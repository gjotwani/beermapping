<?php
namespace Tests\Client\BeerMapClient;
use Client\BeerMapClient\BeerMapClient;
use Response\BeerMapClientResponse\BeerMapClientResponse;

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
        self :: $client = new BeerMapClient();
        self :: $client->setApiKey('not-my-api-key');
        self :: $client->setApiUrl('http://beermapping.com/webservice/loccity');
        self :: $beerMapResponseFixture = file_get_contents(__DIR__ . "/../../Fixtures/BeerMapClientResponse.xml");
        self :: $beerMapResponse = new BeerMapClientResponse(self :: $beerMapResponseFixture);
    }

    /**
     * Simply check if above
     * fixtures are not null
     */
    public function testFixturesNotNull()
    {
        $this->assertNotNull(self :: $client);
        $this->assertNotNull(self :: $beerMapResponseFixture);
        $this->assertNotNull(self :: $beerMapResponse);
    }
}
