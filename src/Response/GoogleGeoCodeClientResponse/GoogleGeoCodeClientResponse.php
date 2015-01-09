<?php
namespace Response\GoogleGeoCodeClientResponse;

class GoogleGeoCodeClientResponse
{
    private $rawResponse;

    public function __construct($rawResponse)
    {
        $this->rawResponse = $rawResponse;
    }

    public function getGeoLocation()
    {
        $rawResponse = json_decode($this->rawResponse, true);

        $geoCodedInfo = array();

        //Response status will be 'OK'
        //if able to geocode given address
        if ($rawResponse['status']='OK' && !empty($rawResponse['results'][0])) {

            $latitude = $rawResponse['results'][0]['geometry']['location']['lat'];
            $longitude = $rawResponse['results'][0]['geometry']['location']['lng'];
            $formattedAddress = $rawResponse['results'][0]['formatted_address'];

            // verify if data is complete
            if ($latitude && $longitude && $formattedAddress) {
                $geoCodedInfo['latitude'] = $latitude;
                $geoCodedInfo['longitude'] = $longitude;
                $geoCodedInfo['formatted_address'] = $formattedAddress;
            }
        }

        return $geoCodedInfo;
    }
}
