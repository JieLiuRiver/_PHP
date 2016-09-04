<?php
// 给定任意的文件地址都可以下载，无论任何类型
// $file = './Penguins.jpg';
$file = './20150814.rar';

// 主体-处理方式： 附件
header('Content-Disposition: attachment;filename=' . basename($file));

// 类型
$finfo = new Finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($file);
header('Content-Type: ' . $mime);

// 大小
header('Content-Length: ' . filesize($file));


$handle = fopen($file, 'r') ;
while(! feof($handle)) {
	echo fgets($handle, 1024);
}
fclose($handle);