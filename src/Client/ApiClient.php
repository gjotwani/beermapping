<?
namespace Client;

abstract Class ApiClient implements ApiClientInterface
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $apiUrl;

    /**
     * Magic getter
     * for class properties
     *
     * @param string $name property name
     * @return mixed property value
     */
    public function __get($name)
    {
        return property_exists(__CLASS__, $name) ? $this->{$name} : false;
    }

    /**
     * Factory for Apiclients
     *
     * @param string client name
     * @throws InvalidArgumentException if api client non existant
     * @return mixed Apiclient object or an expecption
     */
    public static function getClient($clientName)
    {
        $clientLocation = __DIR__ . '/'. $clientName . '/' . $clientName . '.php';
        if (file_exists($clientLocation)) {
            include_once($clientLocation);
            $ns = __NAMESPACE__ . "\\$clientName\\$clientName";
            $client = new $ns();
            return $client;
        } else {
            throw new \InvalidArgumentException("Client of type $clientName not found", 1);
        }
    }
    /**
     * @return string raw api response
     */
    public function getRawResponse($requestUrl)
    {
        $rawResponse = file_get_contents($requestUrl);
        return $rawResponse;
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    abstract function getRequestUrl();
}