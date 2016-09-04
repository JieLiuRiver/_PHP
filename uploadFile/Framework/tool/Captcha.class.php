<?php

    /*================*/
    /*  验证码工具类
    /*================*/
    class Captcha{

        /*================*/
        /*  生成验证码图片的方法
        /*================*/
        public function makeImage( $code_len = 4 ){

            /*================*/
            /*  处理码值
            /*================*/
            $char_list = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
            $char_list_len = strlen($char_list);
            $code = '';
            for( $i=1; $i<=$code_len; ++$i ){
                $rand_index = mt_rand(0, $char_list_len-1);     //A-9之间随机下标
                $code .= $char_list[$rand_index];
            }
            @session_start();       // 需要考虑程序中重复开启session的问题。严格依赖session机制的功能中，需要强制开启session。
            $_SESSION['code'] = $code;      //保存到session中


            /*================*/
            /*  处理验证码图片
            /*================*/
            $bg_file = FRAMEWORK . 'tool/captcha/captcha_bg' . mt_rand(1,5) . '.jpg';


            /*================*/
            /*  创建画布
            /*================*/
            $image = imagecreatefromjpeg( $bg_file );


            /*================*/
            /*  操作画布
            /*================*/
            if( mt_rand(1,2) == 1 ){
                $str_color = imagecolorallocate( $image, 0xff, 0xff, 0xff);  //白色
            }else{
                $str_color = imagecolorallocate( $image, 0, 0, 0);  //黑色
            }
            $image_w = imagesx($image);     //计算图片宽度
            $image_h = imagesy($image);     //计算图片高度
            $font = 5;
            $font_w = imagefontwidth($font);
            $font_h = imagefontheight($font);
            $str_w = $font_w * $code_len;
            $str_h = $font_h;
            $x = ($image_w - $str_w)/2;
            $y = ($image_h - $str_h)/2;
            imagestring( $image, $font, $x, $y, $code, $str_color );

            /*================*/
            /*  输出画布,销毁画布
            /*================*/
            header("Content-Type:image/jpeg");
            imagejpeg($image);
            imagedestroy($image);

        }


        /*================*/
        /*  校验验证码的动作
        /*================*/
        public function checkCode( $value ){
            @session_start();       //开启session

            //存在且相等
            $result = isset( $value ) && isset( $_SESSION['code'] ) && strtoupper( $value ) == strtoupper( $_SESSION['code'] );

            unset( $_SESSION['code'] );         //销毁使用过的验证码

            return $result;

        }

    }