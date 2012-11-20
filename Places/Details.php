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
}
