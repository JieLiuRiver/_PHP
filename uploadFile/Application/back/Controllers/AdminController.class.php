<?php
class AdminController extends PlatformController{

    /*================*/
    /*  载入登陆页面
    /*================*/
    function LoginAction(){
        include  VIEW_PATH.'login.html';
    }


    /*================*/
    /*  登陆验证动作
    /*================*/
    function CheckLoginAction(){

        /*================*/
        /*  首先判断验证码是否正确
        /*================*/
        $t_captcha = new Captcha();
        if( !$t_captcha->checkCode( $_POST['captcha'] ) ){  //验证不正确
            $this->GotoUrl('验证码错误', '?p=back&c=Admin&a=Login', 2);
        }


        /*================*/
        /*  其次验证session cookie
        /*================*/
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $model = ModelFactory::M("AdminModel");
        //$result = $model->CheckAdmin($user, $pass);
        //当管理员是合法的，返回管理员信息
        $admin_info = $model->CheckAdminInfo($user, $pass);
        if( $admin_info ){
            session_start();
            $_SESSION['admin_info'] = $admin_info;

            //进入管理页面之前，有记录状态的需求，则记录
            if( isset( $_POST['remember'] ) ){
                //原始数据+混淆字符串(盐值)，加密
                setcookie('admin_id', md5($admin_info['userid'] . 'SALT'), PHP_INT_MAX);
                setcookie('admin_pass',md5($admin_info['userPassword'] .'SALT'), PHP_INT_MAX);
            }
            header('Location:index.php?p=back&c=Manage&a=Index');            //登陆成功，跳转到后台首页
        }else{
            $this->GotoUrl("登录失败","?p=back&c=Admin&a=Login");            //登陆失败，跳转后台登陆页
        }
    }

    /*================*/
    /*  生成验证码动作
    /*================*/
    public function CaptchaAction(){
        $t_captcha = new Captcha();
        $t_captcha->makeImage();
    }

}