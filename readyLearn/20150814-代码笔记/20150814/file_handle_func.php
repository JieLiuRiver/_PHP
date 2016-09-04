<?php

header('Content-Type: text/html; charset=utf-8');
$file = './data.txt';
$mode = 'r';
$handle = fopen($file, $mode);
// var_dump($handle);
/*
$result = fgetc($handle);
echo $result; // var_dump($result);
$result = fgetc($handle);
echo $result; // var_dump($result);
$result = fgetc($handle);
echo $result; // var_dump($result);
// */
// $str = fgets($handle, 3);
// var_dump($str);
// $str = fgets($handle, 3);
// var_dump($str);

// $str = fgets($handle, 30);
// var_dump($str);
//
// while(! feof($handle)) {// 没到达末尾
// 	$line = fgets($handle, 1024);
// 	echo $line;
// }
//
$str = fread($handle, 20);
var_dump($str);