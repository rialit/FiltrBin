<?php


use FiltrBin\Founder\AddingMas;

use FiltrBin\FileMeneger\Values\ArrayInt;


class ArrayIntTest extends \PHPUnit\Framework\TestCase
{   
    protected  $stack; 


    /**
     * Test that true does in fact equal true
     */
    public function testCreateArray()
    {
        
        $count = 10;

        $arrForTest = [];

        for($i = 0; $i < $count; $i++){
            $arrForTest[] = rand(1, 999);
        }

        $arrInt = new ArrayInt();

        $strData = $arrInt->setValue($arrForTest);

        $pos = rand(1,5);

        $fs = fopen("bin/test.bb", "c+");

        fseek($fs, $pos*4);
        fwrite($fs, $strData);
        fclose($fs);

        $this->assertTrue(true);

        return ["count" => $count, "arr" => $arrForTest, "pos" => $pos];
        
    }

    /**
     * @depends testCreateArray
     */
    public function testReadArr($vv){

        $count      = $vv["count"];
        $arrForTest = $vv["arr"];
        $pos        = $vv["pos"];


        $arrInt = new ArrayInt();

        $fs = fopen("bin/test.bb", "r");

        $data = $arrInt->getValue($pos, $fs);

        $this->assertIsArray($data);

        $this->assertTrue(count($data) === $count);

        foreach($data as $key => $val){
            
            $this->assertTrue($val === $arrForTest[$key]);
        }

    }
}