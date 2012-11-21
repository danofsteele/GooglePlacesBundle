<?php

namespace DanOfSteele\GooglePlacesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DanOfSteele\GooglePlacesBundle\Places\Search;
use DanOfSteele\GooglePlacesBundle\Places\Details;
use DanOfSteele\GooglePlacesBundle\Places\PlaceAutocomplete;

class DefaultController extends Controller
{
    /**
     * @Route("/search/{keywords}")
     * @Template()
     */
    public function searchAction($keywords)
    {              
        $search = new Search($this->container);
        
        $search->setKeywords($keywords);
        $search->setLocation('51.507033,-0.127716'); // London
        $search->setRadius(10000); // 10km
        
        $results = $search->getResults();

        return array('results' => $results);
    }
    
    /**
     * @Route("details/{reference}")
     * @Template()
     */
    public function detailsAction($reference)
    {
        $details = new Details($this->container);
        
        $details->setReference($reference);
        $results = $details->getResults();
        
        return array('results' => $results);
    }
    
    /**
     * @Route("/search/autocomplete/{input}")
     * @Template()
     */
    public function placeAutocompleteAction($input)
    {
        $autocomplete = new PlaceAutocomplete($this->container);
        
        $autocomplete->setInput($input);
        $autocomplete->setTypes('(cities)');
        //$autocomplete->setComponents('country:gb');
        
        $results = $autocomplete->getResults();
        
        return array('results' => $results);
    }
}
