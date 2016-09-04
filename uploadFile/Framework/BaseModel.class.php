<?php
    class BaseModel{
        protected  $_dao = null;
        function __construct(){
            $config = array(
                'host' => "diligentantor.gotoftp11.com",
                'port' => 80,
                'user' => "diligentantor",
                'pass' => "123123",
                'charset' => "utf8",
                'dbname' => "diligentantor"
            );
            $this->_dao = MySQLDB::GetInstance( $config );
        }
    }