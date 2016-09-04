<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/4 0004
 * Time: 下午 5:50
 */

class GoodsModel extends BaseModel{

    /*====================*/
    /*  插入商品
    /*====================*/
    public function insertGoods( $data ){
        $sql = "INSERT INTO goods (goods_id, goods_name, shop_price, goods_desc, goods_number, is_best, is_new, is_hot, is_on_sale, admin_id, create_time) VALUES (null, '{$data['goods_name']}', '{$data['shop_price']}', '{$data['goods_desc']}', '{$data['goods_number']}', '{$data['is_best']}', '{$data['is_new']}', '{$data['is_hot']}', '{$data['is_on_sale']}', '{$data['admin_id']}', '{$data['create_time']}')";

        return $this->_dao->exec($sql);
    }

}