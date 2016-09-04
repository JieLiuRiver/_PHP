<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/4 0004
 * Time: 下午 4:33
 */

    echo "<pre>";
    var_dump( $_FILES );

    $tmp_file = $_FILES['goods_image']['tmp_name'];// 临时文件地址
    $dst_file = './test.jpg';// 目标文件地址
    $result = move_uploaded_file($tmp_file, $dst_file);
    var_dump($result);