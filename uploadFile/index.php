<?php

$p = !empty($_GET['p'])?$_GET['p'] : "front"; //p代表用哪个平台，默认前台

$c = !empty($_GET['c']) ? $_GET['c'] : "User";  //c代表用哪个控制器  我们这里，把“user”当做默认要使用的控制器

$a  = !empty($_GET['a'])?$_GET['a'] : "Index";    //获取动作

define("PLAT", $p);     //存储在常量中，保证不会被修改

define("CONTROLLER",$c);    //后台需要来判断，admin控制器

define("ACTION", $a);       //后台需要来判断 admin控制器 相关动作

define("DS",DIRECTORY_SEPARATOR);   //分隔符

define("ROOT",__DIR__. DS);         //根目录

define("APP", ROOT . 'Application' . DS);   //application路径

define("FRAMEWORK", ROOT . 'Framework' . DS);  //framewwork 路径

define("PLAT_PATH", APP . PLAT . DS);   //当前平台目录

define("CTRL_PATH", PLAT_PATH . "Controllers" . DS);   //当前控制器目录

define("MODEL_PATH", PLAT_PATH . "Models" . DS);

define("VIEW_PATH", PLAT_PATH . "Views" . DS);  //当前视图目录


//自动加载，再次优化：
function __autoload( $class ){
    $base_class['MySQLDB'] = FRAMEWORK . 'MySQLDB.class.php';
    $base_class['BaseModel'] = FRAMEWORK . 'BaseModel.class.php';
    $base_class['ModelFactory'] = FRAMEWORK . 'ModelFactory.class.php';
    $base_class['BaseController'] = FRAMEWORK . 'BaseController.class.php';
    $base_class['Captcha'] = FRAMEWORK . 'tool/Captcha.class.php';
    $base_class['Upload'] = FRAMEWORK . 'tool/Upload.class.php';

    if( isset( $base_class[$class] ) ){
        require $base_class[$class];
    }else if( substr($class, -5) == "Model"){//所需要的类的名字最后5个字符是"Model”时
        require  MODEL_PATH  .  $class  . ".class.php";
    }
    else if( substr($class, -10) == "Controller"){//所需要的类的名字最后10个字符是"Controller”时
        require  CTRL_PATH  .  $class  . ".class.php";
    }
}

/*function __autoload($class){        //需要找类的时候，会自动调用
    $base_class = array('MySQLDB','BaseModel','ModelFactory','BaseController');
    if( in_array( $class, $base_class) ){       //如果需要的类在数组的存在着
        require FRAMEWORK . $class . '.class.php';	//加载基础模型类
    }
    else if( substr($class, -5) == "Model"){//所需要的类的名字最后5个字符是"Model”时
        require  MODEL_PATH  .  $class  . ".class.php";
    }
    else if( substr($class, -10) == "Controller"){//所需要的类的名字最后10个字符是"Controller”时
        require  CTRL_PATH  .  $class  . ".class.php";
    }
}*/


//以下6行代码，被上面自动加载函数所代替：
/*require FRAMEWORK. 'MySQLDB.class.php';

require FRAMEWORK. 'BaseModel.class.php';

require FRAMEWORK. 'ModelFactory.class.php';

require FRAMEWORK. 'BaseController.class.php';

require MODEL_PATH . $c ."Model.class.php";  //引模型

require CTRL_PATH . $c ."Controller.class.php";       //引控制器*/


$controller_name = $c . 'Controller';       //控制器名

$ctrl = new $controller_name();     //实例

$action = $a . 'Action';      //动作名称

$ctrl->$action();   //调用动作方法

