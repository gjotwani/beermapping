<?php
/**
 * A template for the BeerMapClient
 *
 * @author Gaurav Jotwani <grjotwani@gmail.com>
 */

namespace Client\BeerMapClient;

interface BeerMapClientInterface
{
    /**
     * Magic getter
     * for class properties
     *
     * @param string $name property name
     * @return mixed property value
     */
    public function __get($name);

    /**
     * Setter for
     * location query
     *
     * @param string $locationNameQuery
     */
    public function setLocation($locationNameQuery);

    /**
     * Execute a search and
     * get a response object
     *
     * @return BeerMapResponse BeerMapApi response object
     */
    public function getResponse();

    /**
     * @return string url for request
     */
    public function getRequestUrl();

    /**
     * @return string raw api response
     */
    public function getRawResponse();
}
