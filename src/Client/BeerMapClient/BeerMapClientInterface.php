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
     * Setter for
     * location query
     *
     * @param string $locationNameQuery
     */
    public function setLocation($locationNameQuery);
}
