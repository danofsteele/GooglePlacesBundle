<?php

namespace DanOfSteele\GooglePlacesBundle\Places;

/**
 * @example https://developers.google.com/places/documentation/autocomplete
 */
class PlaceAutocomplete extends Autocomplete
{
    /**
     * A grouping of places to which you would like to restrict your results. 
     * Currently, you can use components to filter by country. The country must 
     * be passed as a two character, ISO 3166-1 Alpha-2 compatible country code. 
     * For example: components=country:fr would restrict your results to places 
     * within France.
     * @var string
     */
    protected $components;
    
    /**
     * 
     */
    public function __construct($container)
    {
        parent::__construct($container, 'place');
    }
    
    /**
     * @param string $components
     */
    public function setComponents($components)
    {
        $this->components = $components;
        $this->setParameter('components', $this->getComponents());
    }
    
    /**
     * @return string
     */
    public function getComponents()
    {
        return $this->components;
    }
}
