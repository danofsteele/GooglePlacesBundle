<?php

namespace DanOfSteele\GooglePlacesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DanOfSteele\GooglePlacesBundle\Places\Search;
use DanOfSteele\GooglePlacesBundle\Places\Details;

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
}
