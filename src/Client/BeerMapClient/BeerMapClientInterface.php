<?php
/**
 * A template for the BeerMapClient
 *
 * @author Gaurav Jotwani <grjotwani@gmail.com>
 */

namespace Client\BeerMapClient;

interface BeerMapClientInterface
{
    public function __get($name);

    public function setLocation($locationNameQuery);

    public function getResponse();

    public function getRequestUrl();

    public function getRawResponse();
}
