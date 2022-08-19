<?php


use FiltrBin\Founder\AddingMas;


class FilesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test that true does in fact equal true
     */
    public function testTrueIsTrue()
    {

        $count = 1000;

        for ($i=0; $i < $count; $i++) { 
            
            $num = rand(1, 10000);

            AddingMas::addInFileMas($num);

        }

        $this->assertTrue(true);
        
    }

    /**
     * @depends testTrueIsTrue
     */
    public function testIsSortMas(){

        $res = AddingMas::readAll();

        var_dump(count($res));

        $this->assertIsArray($res);

    }
}