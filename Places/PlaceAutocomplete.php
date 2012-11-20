<?php

namespace DanOfSteele\GooglePlacesBundle\Places;

/**
 * @example https://developers.google.com/places/documentation/autocomplete
 */
class PlaceAutocomplete extends Autocomplete
{
    /**
     * 
     */
    public function __construct()
    {
        parent::__construct('place');
    }
}
