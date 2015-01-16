<?php
namespace Tests\Response\BeerMapClientResponse;

use \Response\BeerMapClientResponse\BeerMapClientResponse;

class BeerMapClientResponseTest extends \PHPUnit_Framework_TestCase
{
    private static $beerMapResponse;

    public static function setUpBeforeClass()
    {
        $beerMapResponseFixture = file_get_contents(__DIR__ . "/../../Fixtures/BeerMapClientResponse.xml");
        self :: $beerMapResponse = new BeerMapClientResponse($beerMapResponseFixture, 'Alexandria');
    }

    /**
     * Test Client BeerMap response object
     */
    public function testResponseType()
    {
        $this->assertNotNull(self :: $beerMapResponse);

        $expectedType = 'Response\BeerMapClientResponse\BeerMapClientResponse';

        $this->assertEquals(
            get_class(self :: $beerMapResponse), $expectedType,
            "Response isnt of expected type : $expectedType"
        );
    }

    /**
     * Test Client BeerMap response object
     */
    public function testResponseContents()
    {
        $response = self :: $beerMapResponse->asArray();

        $this->assertArrayHasKey("description", $response);
        $this->assertArrayHasKey("numFound", $response);
        $this->assertArrayHasKey("payload", $response);
        $this->assertGreaterThan(20, count($response["payload"]));

        $breweries = $response["payload"];
        for ($i = 0; $i < 3; $i++) {
            $this->assertArrayHasKey('id', $breweries[$i]);
            $this->assertNotNull('name', $breweries[$i]);
            $this->assertNotNull('reviewlink', $breweries[$i]);
            $this->assertNotNull('city', $breweries[$i]);
            $this->assertNotNull('street', $breweries[$i]);
        }
    }
}
