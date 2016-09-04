<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/4 0004
 * Time: 下午 4:49
 */

header('Content-type:text/html;charset=utf-8');

$result = uploadFile($_FILES['goods_image']);

var_dump( $result );

/*=================*/
/* 文件上传函数
/*=================*/

function uploadFile( $file_info ){

    if( $file_info['error'] != 0 ){     //如果有错
        echo "上传文件存在错误";
        return false;
    }


    $ext_list = array('.jpg', '.png', '.gif', '.jpeg');
    $ext = strrchr( $file_info['name'],'.' );
    if( ! in_array($ext, $ext_list) ){                  //如果文件类型都不存在
        echo '类型，后缀不合法';
        return false;
    }

    $mime_list = array('image/jpeg', 'image/png', 'image/gif');// 允许的mime列表！
    if (! in_array($file_info['type'], $mime_list)) {
        echo '类型，MIME不合法';
        return false;
    }

    $max_size = 700*1024;// 允许的最大尺寸
    if ($file_info['size'] > $max_size) {              //如果文件过大
        echo '文件过大';
        return false;
    }

    $upload_path = './';
    $prefix = '';
    $dst_name = uniqid( $prefix, true ) . $ext;

    // 移动！
    if (move_uploaded_file($file_info['tmp_name'], $upload_path . $dst_name)) {
        // 移动成功
        return $dst_name;       // 仅仅返回 上传目录之后的地址即可！
    } else {
        echo '移动失败';
        return false;
    }

}


