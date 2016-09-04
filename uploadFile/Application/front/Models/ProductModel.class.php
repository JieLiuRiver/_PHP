<?php
class ProductModel extends BaseModel{
	function GetAllProduct(){
		$sql = "select product.*, protype_name from product";
		return $this->_dao->getRows($sql);
	}
	function DelProductById($id){
		$sql = "delete from product where Pro_id = $id";
		return $this->_dao->exec($sql);
	}
}