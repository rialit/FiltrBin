<?php

namespace FiltrBin\Founder;


class AddingMas
{
	const PUTH = "C:/OpenServer/domains/FiltrBin/bin/TestAddingMas.bin";


	public static function addInFileMas($num){

    	$res = self::readAll();

    	$count = $res[1];

    	$arr = array_slice($res, 1);

    	$arr[] = $num;

    	sort($arr);

    	$fs = self::open();

    	self::countSave($fs, $count);

    	$str = pack("I*", ...$arr);

    	fseek($fs, 4);
    	fwrite($fs, $str);
    	fclose($fs);

    }


    public static function addInFile($num){

    	// var_dump(__DIR__);

    	$forWrite = pack("I", $num);

    	$fs = self::open();

    	$count = self::readCount($fs);

    	// var_dump($count);

    	fseek($fs, $count*4+4);

    	fwrite($fs, $forWrite);

    	self::countSave($fs, $count);

    	// var_dump($count);

    	// self::sort($fs, $num, $count*4-4);

    	fclose($fs);

    }

    public static function readCount($fs){

    	fseek($fs, 0);

    	$reader = fread($fs, 4);
    	$res = 0;

    	if(strlen($reader) > 3){

    		$res = unpack("I", $reader);
    		$res = $res[1];

    	}
    	
    	return $res;
    }

    public static function countSave($fs, &$count, $add = 1){

    	$count = $count + $add;

    	fseek($fs, 0);

    	$strCount = pack("I", $count);

    	fwrite($fs, $strCount);

    }

    public static function open(){

    	if(!file_exists(self::PUTH)){

    		file_put_contents(self::PUTH, "");

    	}

    	$fs = fopen(self::PUTH, "c+");

    	return $fs;
    }

    public static function readAll(){

    	$file = file_get_contents(self::PUTH);

    	$arr = unpack("I*", $file);

    	return $arr;

    }

    public static function clear(){

    	file_put_contents(self::PUTH, "");

    }

    public static function sort($fs, $num, $posLast){


    	if($posLast == 0){

    		self::wrFs($fs, $num, $posLast+4);

    		return;
    	}


    	fseek($fs, $posLast);

    	$a = fread($fs, 4);

    	$a = unpack("I", $a)[1];

    	if($a>$num){

    		self::wrFs($fs, $a, $posLast+4); 

    		return self::sort($fs, $num, $posLast-4);

    	} else {

    		self::wrFs($fs, $num, $posLast+4);

    	}

    }

    public static function wrFs($fs, $num, $posLast){

    	fseek($fs, $posLast);

		$strInA = pack("I", $num);

		fwrite($fs, $strInA);

    }
}
