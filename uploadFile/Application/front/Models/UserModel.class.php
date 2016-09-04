<?php
    class UserModel extends BaseModel{

        function GetAllUser(){
            $sql = "select * from userlist;";
            $data = $this->_dao->GetRows( $sql );
            return $data;
        }

        function GetUserCount(){
            $sql = "select count(*) as c from userlist;";
            $data = $this->_dao->GetOneData( $sql );
            return $data;
        }

        function GetUserInfoById( $id ){
            $sql = "select * from userlist where userid = $id";
            $data = $this->_dao->GetOneRow( $sql );
            return $data;
        }

        function GetUserInfoByUserName( $name ){

        }

        function delUserById( $id ){
            $sql = "delete from userlist where userid = $id";
            $data = $this->_dao->exec( $sql );
            return $data;
        }

        function InsertUser( $username, $password, $age, $education,$xingqu, $from ){
            $sql = "insert into userlist(userName, userPassword, age, education,xingqu, fromWhere,regTime)values(";
            $sql .= "'$username', md5('$password'), $age, '$education','$xingqu', '$from', now())";
            $result = $this->_dao->exec( $sql );
            return $result;
        }

        function UpdateUser($id, $username, $password,$age,$education, $xingqu,$from){
            $sql = "update userlist set userName='$username'";
            if(!empty($password)){
                $sql .= ", userPassword=md5('$password')";
            }
            $sql .= ", age='$age'";
            $sql .= ", education='$education'";
            $sql .= ", xingqu='$xingqu'";
            $sql .= ", fromWhere='$from'";
            $sql .= " where userid = $id";
            $result = $this->_dao->exec($sql);
            return $result;
        }

    }