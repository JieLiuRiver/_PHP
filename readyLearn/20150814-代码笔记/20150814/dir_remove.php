<?php

$path = 'e:/amp/apache/htdocs/shop39_deleted';
$result = rmDirs($path);
var_dump($result);
// 递归删除
function rmDirS($path) {
	$handle = opendir($path);
	while(false !== ($filename = readdir($handle))) {
		// ., .. 直接跳过
		if ($filename == '.' || $filename == '..') continue;
		// 判断当前读取到的是否为目录
		if (is_dir($path . '/' . $filename)) {
			// 是目录，递归处理，深度+1
			rmDirS($path . '/' . $filename);
		} else {
			// 文件
			unlink($path . '/' . $filename);
		}
	}
	closedir($handle);
	// 删除该目录
	return rmdir($path);
}