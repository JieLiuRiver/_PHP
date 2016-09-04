<?php


header('Content-Type: text/html; charset=utf-8');
// Fri, 14 Aug 2015 11:24:40 GMT
// $expires = gmdate('D, d M Y H:i:s', time()+3) . ' GMT';
$expires = gmdate('D, d M Y H:i:s', time()-1) . ' GMT';
header('Expires: ' . $expires);

echo date('H:i:s'), '<br>';
?>
	<hr>
	<a href="cache.php">点击</a>