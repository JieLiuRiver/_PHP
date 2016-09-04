<?php

$file = './data.txt';
$mode = 'a';// 追加写
$mode = 'w';// 追加写
$handle = fopen($file, $mode);

$data = date('Y-m-d H:i:s') . "\n";
$result = fwrite($handle, $data);
var_dump($result);


fclose($handle);