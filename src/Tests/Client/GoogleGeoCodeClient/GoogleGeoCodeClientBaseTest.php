<?php
namespace Tests\Client\GoogleGeoCodeClient;
use Client\GoogleGeoCodeClient\GoogleGeoCodeClient;
use Response\GoogleGeoCodeClientResponse\GoogleGeoCodeClientResponse;

class GoogleGeoCodeClientBaseTest extends \PHPUnit_Framework_TestCase
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
    public static $googleGeoCodeResponseFixture;

    /**
     * Response object
     *
     * @var object
     */
    public static $googleGeoCodeResponse;

    /**
     * Setup fixtures prior to tests
     */
    public static function setUpBeforeClass()
    {

        self :: $client = new GoogleGeoCodeClient();
        self :: $client->setApiKey('not-my-api-key');
        self :: $client->setApiUrl('http://maps.googleapis.com/maps/api/geocode/json');
        self :: $googleGeoCodeResponseFixture = file_get_contents(__DIR__ . "/../../Fixtures/GoogleGeoCodeClientResponse.json");
        self :: $googleGeoCodeResponse = new GoogleGeoCodeClientResponse(self :: $googleGeoCodeResponseFixture);
    }

    /**
     * Simply check if above
     * fixtures are not null
     */
    public function testFixturesNotNull()
    {
        $this->assertNotNull(self :: $client);
        $this->assertNotNull(self :: $googleGeoCodeResponseFixture);
        $this->assertNotNull(self :: $googleGeoCodeResponse);
    }
}
