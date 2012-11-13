<?php

namespace DanOfSteele\GooglePlacesBundle\Places;

abstract class Places extends AbstractPlaces
{
    protected $key;
    protected $output;
    protected $method;
    protected $api;
    
    abstract public function setMethod();
    
    /**
     * TODO: fetch API key from config.yml
     * TODO: fetch output format from config.yml
     */
    public function __construct()
    {
        $this->setKey('AIzaSyDUdGAA6elyiwc-HWAyhUZ3JDjeR62UtmU');
        $this->setOutput('json');
        $this->setApi('https://maps.googleapis.com/maps/api/place/');
    }
    
    /**
     * 
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
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
    public function setApi($api)
    {
        $this->api = $api;
    }
    
    /**
     * 
     * @return string
     */
    public function getApi()
    {
        return $this->api;
    }

}