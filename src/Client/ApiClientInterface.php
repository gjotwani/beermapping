<?php

namespace Client;

interface ApiClientInterface
{
    /**
     * Magic getter
     * for class properties
     *
     * @param string $name property name
     * @return mixed property value
     */
    public function __get($name);

    public static function getClient($clientName);

    /**
     * @return string raw api response
     */
    public function getRawResponse($requestUrl);

    public function setApiKey($apiKey);

    public function setApiUrl($apiUrl);

    public function getRequestUrl();

    public function setHttpClient($client);
}
