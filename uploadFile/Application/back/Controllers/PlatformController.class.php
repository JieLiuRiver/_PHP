<?php

//后台back的平台控制器

class PlatformController extends BaseController {

        public function __construct(){
            //强制调用父类重写的构造方法
            parent::__construct();
            $this->_check();    //在实例化后台控制器之前，调用它，完成登陆验证。
        }

        /*
         *  校验是否登陆
        */
        protected function _check(){
            session_start();

            //unset($_SESSION['admin_info']);

            //排除admin控制器的校验
            $curr_controller = strtolower(CONTROLLER);
            $curr_action = strtolower(ACTION);
            if( $curr_controller == 'admin' && ( $curr_action == 'login' || $curr_action == 'checklogin' || $curr_action == 'captcha' ) ){
                return;
            }


            //校验，判断是否具有登陆标识 session
            if( !isset( $_SESSION['admin_info'] ) ){        //没有session

                //最后一次机会：看看有没有相应的cookie,并且成功从数据库匹配出对应的管理员 -->给你重新设置 session, 让你进入
                $m_admin = ModelFactory::M("AdminModel");
                $cookie_id = $_COOKIE['admin_id'];
                $cookie_pass = $_COOKIE['admin_pass'];
                if( isset($cookie_id) && isset($cookie_pass) && $admin_info = $m_admin->CheckCookieInfo($cookie_id, $cookie_pass) ){
                    $_SESSION['admin_info'] = $admin_info;
                }else{
                    header('Location:index.php?p=back&c=Admin&a=Login');
                    //如果没有登陆，跑 Admin控制器，但，Admin控制器也继承Platform控制器，也会调用验证。 会出问题，因为需要特殊处理Admin控制器
                    die();
                }
            }
        }
}