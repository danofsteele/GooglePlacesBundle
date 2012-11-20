<?php

namespace DanOfSteele\GooglePlacesBundle\Places;

/**
 * 
 */
class Autocomplete extends Search
{
    /**
     * The text string on which to search. The Place service will return 
     * candidate matches based on this string and order results based on their 
     * perceived relevance.
     * @var string
     */
    protected $input;
    
    /**
     * The character position in the input term at which the service uses text 
     * for predictions. For example, if the input is 'Googl' and the completion 
     * point is 3, the service will match on 'Goo'. The offset should generally 
     * be set to the position of the text caret. If no offset is supplied, the 
     * service will use the entire term.
     * @var integer
     */
    protected $offset;
    
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
     * instructs the Place service to return only geocoding (address) results. 
     * Generally, you use this request to disambiguate results where the 
     * location specified may be indeterminate.
     * @var string true|false
     */
    protected $geocode;
    
    /**
     * instructs the Place service to return only business results.
     * @var string true|false
     */
    protected $establishment;
    
    /**
     * @param string $type
     */
    public function __construct($type = 'places')
    {
        parent::__construct();
        
        switch($type)
        {
            case 'query':
                $this->setMethod('queryautocomplete');
                break;
            default:
                $this->setMethod('autocomplete');
        }
        
    }
    
    /**
     * @param string $input
     */
    public function setInput($input)
    {
        $this->input = $input;
        $this->setParameter('input', $this->getInput());
    }
    
    /**
     * @return string
     */
    public function getInput()
    {
        return $this->input;
    }
    
    /**
     * @param integer $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
        $this->setParameter('offset', $this->getOffset());
    }
    
    /**
     * @return string
     */
    public function getOffset()
    {
        return $this->offset;
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
