<?php

namespace DanOfSteele\GooglePlacesBundle\Places;

use Buzz\Browser;
use Buzz\Client\Curl;

abstract class Places extends AbstractPlaces
{
    /**
     * @var \Buzz\Browser
     */
    protected $browser;
    
    /**
     * Your application's API key. This key identifies your application for 
     * purposes of quota management and so that Places added from your 
     * application are made immediately available to your app. Visit the APIs 
     * Console to create an API Project and obtain your key.
     * @var string
     */
    protected $key;
    
    /**
     * The format of the returned data, either JSON or XML
     * @var string
     */
    protected $output;
    
    /**
     * The API method
     * @var string
     */
    protected $method;
    
    /**
     * The API endpoint
     * @example https://maps.googleapis.com/maps/api/place/
     * @var string
     */
    protected $apiEndpoint;
    
    /**
     * Indicates whether or not the Place request came from a device using a 
     * location sensor (e.g. a GPS) to determine the location sent in this 
     * request. This value must be either true or false.
     * @var string
     */
    protected $sensor;
    
    /**
     * The language code, indicating in which language the results should be 
     * returned, if possible.
     * @var string
     */
    protected $language;
    
    /**
     * A parameter holder for the request parameters
     * @var array
     */
    protected $parameters;
    
    /**
     *
     */
    public function __construct($container)
    {
        $this->container = $container;
        
        $this->setBrowser(new Browser(new Curl()));
        $this->setKey($container->getParameter('dan_of_steele_google_places.api.key'));
        $this->setOutput($container->getParameter('dan_of_steele_google_places.api.output'));
        $this->setApiEndpoint($container->getParameter('dan_of_steele_google_places.api.endpoint'));

    }
    
    /**
     * @param \Buzz\Browser $browser
     */
    public function setBrowser(Browser $browser)
    {
        $this->browser = $browser;
    }
    
    /**
     * @return \Buzz\Browser
     */
    public function getBrowser()
    {
        return $this->browser;
    }
    
    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
        $this->setParameter('key', $key);
    }
    
    /**
     * 
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }
    
    /**
     * 
     * @param string $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }
    
    /**
     * 
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }
    
    /**
     * 
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
    
    /**
     * 
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
    
    /**
     * 
     * @param string $api
     */
    public function setApiEndpoint($api)
    {
        $this->api = $api;
    }
    
    /**
     * 
     * @return string
     */
    public function getApiEndpoint()
    {
        return $this->api;
    }
    
    /**
     * @param string $sensor
     */
    public function setSensor($sensor)
    {
        $this->sensor = $sensor;
        $this->setParameter('sensor', $this->getSensor());
    }
    
    /**
     * @return string
     */
    public function getSensor()
    {
        return $this->sensor;
    }
    
    /**
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
     * 
     * @param string $name
     * @param string $value
     */
    public function setParameter($name, $value)
    {
        $this->parameters[$name] = $value;
    }
    
    /**
     * 
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
    
    /**
     * 
     * @return string
     */
    public function getCompiledRequest()
    {
        return $this->getApiEndpoint().$this->getMethod().'/'.$this->getOutput().'?'.http_build_query($this->getParameters());
    }
    
    /**
     * @return Object Buzz\Message\Response
     */
    public function send()
    {
        return $this->getBrowser()->get($this->getCompiledRequest());
    }
    
    /**
     * @todo Handle errors
     * @param string $display
     * @return string json/xml
     */
    public function getResults($format = false)
    {
        $request = $this->send();
                
        switch($format) 
        {
            case 'array':
                return json_decode($request->getContent());
            default:
                return $request->getContent();
        }
    }
}