<?php

namespace DanOfSteele\GooglePlacesBundle\Places;

class Search extends Places
{
    // required
    protected $location;
    protected $radius;
    protected $sensor;
    // optional
    protected $keyword;
    protected $language;
    protected $name;
    protected $rankby;
    protected $types;
    protected $pagetoken;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function setMethod()
    {
        
    }
    
}