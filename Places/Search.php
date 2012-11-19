<?php

namespace DanOfSteele\GooglePlacesBundle\Places;

/**
 * https://developers.google.com/places/documentation/search
 */
class Search extends Places
{
    // required
    protected $location;
    protected $radius;
    protected $sensor;
    // optional
    protected $keywords;
    protected $language;
    protected $name;
    protected $rankby;
    protected $types;
    protected $pagetoken;
    
    /**
     * 
     */
    public function __construct()
    {
        parent::__construct();
        
        // set the API method for Search
        $this->setMethod('nearbysearch');
        // set some defaults
        $this->setLocation('51.507033,-0.127716');
        $this->setRadius(10000);
        $this->setSensor('false');
        $this->setLanguage('en');
    }
    
    /**
     * The latitude/longitude around which to retrieve Place information. This 
     * must be specified as latitude,longitude.
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
        $this->setParameter('location', $this->getLocation());
    }
    
    /**
     * 
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }
    
    /**
     * Defines the distance (in meters) within which to return Place results. 
     * The maximum allowed radius is 50,000 meters. Note that radius must not be 
     * included if rankby=distance is specified.
     * @param integer $radius
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;
        $this->setParameter('radius', $this->getRadius());
    }
    
    /**
     * 
     * @return integer
     */
    public function getRadius()
    {
        return $this->radius;
    }
    
    /**
     * Indicates whether or not the Place request came from a device using a 
     * location sensor (e.g. a GPS) to determine the location sent in this 
     * request. This value must be either true or false.
     * @param string $sensor
     */
    public function setSensor($sensor)
    {
        $this->sensor = $sensor;
        $this->setParameter('sensor', $this->getSensor());
    }
    
    /**
     * 
     * @return string
     */
    public function getSensor()
    {
        return $this->sensor;
    }
    
    /**
     *  A term to be matched against all content that Google has indexed for 
     *  this Place, including but not limited to name, type, and address, as 
     *  well as customer reviews and other third-party content.
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = trim($keywords);
        $this->setParameter('keyword', $this->getKeywords());
    }
    
    /**
     * 
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }
    
    /**
     * The language code, indicating in which language the results should be 
     * returned, if possible.
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
    
    /**
     * A term to be matched against the names of Places. Results will be 
     * restricted to those containing the passed name value.
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        $this->setParameter('name', $this->getName());
    }
    
    /**
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Specifies the order in which results are listed. Possible values are: 
     * prominence|distance
     * @param string $rankby
     */
    public function setRankby($rankby)
    {
        $this->rankby = $rankby;
        $this->setParameter('rankby', $this->getRankby());
    }
    
    /**
     * 
     * @return string
     */
    public function getRankby()
    {
        return $this->rankby;
    }
    
    /**
     * Restricts the results to Places matching at least one of the specified 
     * types. Types should be separated with a pipe symbol (type1|type2|etc).
     * Supported types: https://developers.google.com/places/documentation/supported_types 
     * @param string $types
     */
    public function setTypes($types)
    {
        $this->types = $types;
        $this->setParameter('types', $this->getTypes());
    }
    
    /**
     * 
     * @return string
     */
    public function getTypes()
    {
        return $this->types;
    }
    
    /**
     * Returns the next 20 results from a previously run search. Setting a 
     * pagetoken parameter will execute a search with the same parameters used 
     * previously — all parameters other than pagetoken will be ignored.
     * @param integer $page
     */
    private function setPagetoken($page)
    {
        $this->pagetoken = $page;
        $this->setParameter('pagetoken', $this->getPagetoken());
    }
    
    /**
     * 
     * @return integer
     */
    private function getPagetoken()
    {
        return $this->pagetoken; 
    }
    
    /**
     * 
     * @param integer $page
     */
    public function setPage($page)
    {
        $this->setPagetoken($page);
    }
    
    /**
     * 
     * @return integer
     */
    public function getPage()
    {
        return $this->getPagetoken();
    }
        
}