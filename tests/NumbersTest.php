<?php

use FiltrBin\Founder\AddingMas;

class NumbersTest extends \PHPUnit\Framework\TestCase
{

    protected function setUp(): void
    {
        $this->stack = [];

        for ($i=0; $i < 100000; $i++) { 
            $this->stack[] = rand(1, 100000);
        }
    }
    /**
     * Test that true does in fact equal true
     */
    public function testNumLike()
    {

        
        asort($this->stack);

        $this->assertTrue(true);
        
    }

   
}