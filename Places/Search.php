<?php

namespace DanOfSteele\GooglePlacesBundle\Places;

/**
 * @example https://developers.google.com/places/documentation/search
 */
class Search extends Places
{
    /**
     * The latitude/longitude around which to retrieve Place information. This 
     * must be specified as latitude,longitude.
     * @var string latitude,longitude
     */
    protected $location;
    
    /**
     * Defines the distance (in meters) within which to return Place results. 
     * The maximum allowed radius is 50,000 meters. Note that radius must not be 
     * included if rankby=distance is specified.
     * @var integer
     */
    protected $radius;
    
    /**
     * A term to be matched against all content that Google has indexed for 
     * this Place, including but not limited to name, type, and address, as 
     * well as customer reviews and other third-party content.
     * @var string
     */
    protected $keyword;
    
    /**
     * A term to be matched against the names of Places. Results will be 
     * restricted to those containing the passed name value.
     * @var string
     */
    protected $name;
    
    /**
     * Specifies the order in which results are listed. Possible values are: 
     * prominence|distance
     * @var string
     */
    protected $rankby;
    
    /**
     * Restricts the results to Places matching at least one of the specified 
     * types. Types should be separated with a pipe symbol (type1|type2|etc).
     * @example https://developers.google.com/places/documentation/supported_types 
     * @var string
     */
    protected $types;
    
    /**
     * Returns the next 20 results from a previously run search. Setting a 
     * pagetoken parameter will execute a search with the same parameters used 
     * previously — all parameters other than pagetoken will be ignored.
     * @var integer
     */
    protected $pagetoken;
    
    /**
     * 
     */
    public function __construct()
    {
        parent::__construct();
        
        // set the API method for Search
        $this->setMethod('nearbysearch');
        // set the sensor option to false by default
        $this->setSensor('false');
    }
    
    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
        $this->setParameter('location', $this->getLocation());
    }
    
    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }
    
    /**
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
     * @param string $keywords
     */
    private function setKeyword($keyword)
    {
        $this->keyword = trim($keyword);
        $this->setParameter('keyword', $this->getKeyword());
    }
    
    /**
     * A human friendly setter for setKeyword
     * @see setKeyword
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->setKeyword($keywords);
    }
    
    /**
     * @return string
     */
    private function getKeyword()
    {
        return $this->keyword;
    }
    
    /**
     * A human friendly getter for getKeyword
     * @see getKeyword
     * @return string
     */
    public function getKeywords()
    {
        return $this->getKeyword();
    }
    
    /**
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