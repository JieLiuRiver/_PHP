<?php
header('Content-Type: text/html; charset=utf-8');

$file = './data.txt';
$mode = 'r';
$handle = fopen($file, $mode);
echo '位置：', ftell($handle), '<br>';
fseek($handle, 5);
echo '位置：', ftell($handle), '<br>';
echo fgets($handle, 3);