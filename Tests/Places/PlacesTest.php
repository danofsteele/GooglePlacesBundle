<?php

namespace DanOfSteele\GooglePlacesBundle\Tests;

use DanOfSteele\GooglePlacesBundle\Places\Places;
use Buzz\Browser;
use Buzz\Client\Curl;

class placesTest extends \PHPUnit_Framework_TestCase
{
    private $places;
    
    public function setUp()
    {
        parent::setUp();
        $this->places = new Places();
    }
    
    public function tearDown()
    {
        $this->places = null;
        parent::tearDown();
    }
    
    public function testSetGetKey()
    {
        $key = 'key';
        $this->places->setKey($key);
        $this->assertEquals($key,$this->places->getKey());
    }
    
}