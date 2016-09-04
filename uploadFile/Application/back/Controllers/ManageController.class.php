<?php
/*
 * 后台管理首页相关控制器类
 */

class ManageController extends PlatformController{

    public function IndexAction(){
        require VIEW_PATH . 'index.html';

        /*session_start();      //所有都要验证，就放到平台控制器统一做
        if( !isset( $_SESSION['admin_info'] ) ){
            header('Location:index.php?p=back&c=Admin&a=Login');
        }
        echo "<h1><font color='green'>".$_SESSION['admin_info']['userName']."</font>管理员，欢迎登陆后台管理页面</h1>";
        echo '后台首页，正在研发，敬请期待...';*/
    }

    public function TopAction(){
        require VIEW_PATH . 'top.html';
    }

    public function MenuAction(){
        require VIEW_PATH . 'menu.html';
    }

    public function DragAction(){
        require VIEW_PATH . 'drag.html';
    }

    public function MainAction(){
        require VIEW_PATH . 'main.html';
    }

}