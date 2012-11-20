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
        $search = new Search();
        $search->setKeywords($keywords);
        $search->setLocation('51.507033,-0.127716');
        $search->setRadius(10000);
        $results = $search->getResults();

        return array('results' => $results);
    }
    
    /**
     * @Route("details/{reference}")
     * @Template()
     */
    public function detailsAction($reference)
    {
        $details = new Details();
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
        $autocomplete = new PlaceAutocomplete();
        $autocomplete->setInput($input);
        //$autocomplete->setTypes('country');
        $autocomplete->setComponents('country:fr');
        
        $results = $autocomplete->getResults();
        
        return array('results' => $results);
    }
}
