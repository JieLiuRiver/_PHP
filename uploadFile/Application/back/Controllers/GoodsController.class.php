<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/4 0004
 * Time: 下午 5:17
 */

class GoodsController extends PlatformController{

    /*======================*/
    /*  上传表单页面的展现动作
    /*======================*/
    public function addAction(){
        require VIEW_PATH .  'good_add.html';
    }

    /*======================*/
    /*  插入新商品数据动作
    /*======================*/
    public function InsertAction(){

        $data['goods_name'] = $_POST['goods_name'];
        $data['shop_price'] = $_POST['shop_price'];
        $data['goods_desc'] = $_POST['goods_desc'];
        $data['goods_number'] = $_POST['goods_number'];
        $data['is_best'] = isset($_POST['is_best']) ? '1' : '0';
        $data['is_new'] = isset($_POST['is_new']) ? '1' : '0';
        $data['is_hot'] = isset($_POST['is_hot']) ? '1' : '0';
        $data['is_on_sale'] = isset($_POST['is_on_sale']) ? '1' : '0';

        $t_upload = new Upload();   //处理上传图片
        $t_upload->setUploadPath(ROOT.'upload/goods/');  //上传目录
        if( $result = $t_upload->uploadFile( $_FILES['goods_image_ori'] ) ){
            $data['image_ori'] = $result;
        }else{
            $this->GoToURL('文件上传失败，原因是：' . $t_upload->getError(), 'index.php?p=back&c=Goods&a=Add');
            die;
        }

        $data['admin_id'] = $_SESSION['admin_info']['userid'];
        $data['create_time'] = time();

        $m_goods = ModelFactory::M('GoodsModel');   //利用模型插入数据表
        $result = $m_goods->insertGoods( $data );
        if( $result ){      //插入成功
            header('Location:index.php?p=back&c=Goods&a=list');     //跳转
            die;
        }else{
            $this->GotoUrl('失败', 'index.php?p=back&c=Goods&a=add');
            die;
        }
    }

    public function ListAction(){
        echo "Goods:list";
    }

}