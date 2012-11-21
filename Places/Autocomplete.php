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
     * @param string $type
     */
    public function __construct($container, $type = 'places')
    {
        parent::__construct($container);
        
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
    
}
