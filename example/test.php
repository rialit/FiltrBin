<?php


require_once "../vendor/autoload.php";

use FiltrBin\Founder\AddingMas;



echo "<pre>";


$arr = [];

for ($i=0; $i < 1000; $i++) { 
	$arr[] = rand(1,100);
}

var_dump($arr);

asort($arr);

var_dump($arr);


// AddingMas::clear();

// AddingMas::addInFileMas(56);


// $num1 = 234;
// $num2 = 453;

// $str1 = pack("I", $num1);
// $str2 = pack("I", $num2);

// $resPack = $str1 > $str2;

// $resNum = $num1 > $num2;


// var_dump($str1, $str2);
// var_dump($num1, $num2);



// $res = AddingMas::readAll();

// // var_dump($res);

// $count = $res[1];

// $arr = array_slice($res, 1);

// var_dump($count);

// var_dump($arr);




echo "</pre>";

/*
	
5714	20127
4714	16288
3714	1463
3614	1412
3514	1410


*/