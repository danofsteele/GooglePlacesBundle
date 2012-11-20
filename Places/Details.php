<?php

namespace DanOfSteele\GooglePlacesBundle\Places;

/**
 * @example https://developers.google.com/places/documentation/details
 */
class Details extends Places
{
    /**
     * Required.
     * A textual identifier that uniquely identifies a place, returned from a Place search.
     * @var string
     */
    protected $reference;
    
    /**
     * Indicates whether or not the Place request came from a device using a 
     * location sensor (e.g. a GPS) to determine the location sent in this 
     * request. This value must be either true or false.
     * @var string
     */
    protected $sensor;
    
    /**
     * The language code, indicating in which language the results should be 
     * returned, if possible.
     * @var string
     */
    protected $language;
    
    /**
     * 
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->setMethod('details');
        
        $this->setSensor('false');
    }
    
    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        $this->setParameter('reference', $this->getReference());
    }
    
    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }
    
    /**
     * @param string $sensor
     */
    public function setSensor($sensor)
    {
        $this->sensor = $sensor;
        $this->setParameter('sensor', $this->getSensor());
    }
    
    /**
     * @return string
     */
    public function getSensor()
    {
        return $this->sensor;
    }
    
    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        $this->setParameter('langauge', $this->getLanguage());
    }
    
    /**
     * 
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
