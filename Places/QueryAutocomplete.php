<?php

namespace DanOfSteele\GooglePlacesBundle\Places;

/**
 * https://developers.google.com/places/documentation/autocomplete
 */
class QueryAutocomplete extends Autocomplete
{
    
    /**
     * 
     */
    public function __construct($container)
    {
        parent::__construct($container, 'query');
    }
    
}
