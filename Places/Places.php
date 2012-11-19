<?php

namespace DanOfSteele\GooglePlacesBundle\Places;

use Buzz\Browser;
use Buzz\Client\Curl;

abstract class Places extends AbstractPlaces
{
    protected $browser;
    protected $key;
    protected $output;
    protected $method;
    protected $apiEndpoint;
    protected $parameters;
    
    /**
     * TODO: fetch API key from config.yml
     * TODO: fetch output format from config.yml
     */
    public function __construct()
    {
        $this->setBrowser(new Browser(new Curl()));
        $this->setKey('AIzaSyDUdGAA6elyiwc-HWAyhUZ3JDjeR62UtmU');
        $this->setOutput('json');
        $this->setApiEndpoint('https://maps.googleapis.com/maps/api/place/');
        // populate the parameters
        $this->setParameter('key', $this->getKey());
    }
    
    /**
     * 
     * @param \Buzz\Browser $browser
     */
    public function setBrowser(Browser $browser)
    {
        $this->browser = $browser;
    }
    
    /**
     * 
     * @return \Buzz\Browser
     */
    public function getBrowser()
    {
        return $this->browser;
    }
    
    /**
     * Your application's API key. This key identifies your application for 
     * purposes of quota management and so that Places added from your 
     * application are made immediately available to your app. Visit the APIs 
     * Console to create an API Project and obtain your key.
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
     * TODO: Handle errors
     * @return string json/xml
     */
    public function getResults()
    {
        $request = $this->send();
        return $request->getContent();
    }
}