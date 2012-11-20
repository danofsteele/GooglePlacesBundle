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

}
