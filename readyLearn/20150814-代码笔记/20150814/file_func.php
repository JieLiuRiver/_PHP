<?php

/*
$file = './data.txt';
// $data = date('H:i:s') . "\n";
$data = date('H:i:s');
// $result = file_put_contents($file, $data);
// $result = file_put_contents($file, $data, FILE_APPEND);
$result = file_get_contents($file);
// var_dump($result);
echo $result;
echo '<hr>';
echo nl2br($result);
*/
// $result = file_get_contents($file);
/*
$file = './data.txt';
$size = filesize($file);
var_dump($size);
*/

$file = './data.txt';
$time = filemtime($file);
var_dump($time);
echo '<br>';
echo date('H:s:i', $time);
