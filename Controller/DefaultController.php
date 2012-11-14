<?php

namespace DanOfSteele\GooglePlacesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DanOfSteele\GooglePlacesBundle\Places\Search;

class DefaultController extends Controller
{
    /**
     * @Route("/search/{keywords}")
     * @Template()
     */
    public function indexAction($keywords)
    {
        $search = new Search;
        
        $search->setKeywords($keywords);
        
        $results = $search->getResults();

        return array('results' => $results);
    }
}
