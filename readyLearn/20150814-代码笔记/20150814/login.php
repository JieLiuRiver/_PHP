<?php
header('Content-Type: text/html; charset=utf-8');
// 完成登陆（校验用户名密码，设置登陆标识）
//
//
$default_url = 'http://test.kang.com/20150814/index.php';
$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $default_url;
// $_SERVER['HTTP_REFERER'];
header('Refresh: 2; URL=' . $url);
echo '登陆成功';