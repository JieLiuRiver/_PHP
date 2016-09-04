<?php
class AdminModel extends BaseModel{
    function CheckAdmin( $user, $pass ){
        $sql = "select count(*) as c from userlist where userName='$user' and userPassword=md5('$pass')";
        $result = $this->_dao->GetOneData( $sql );
        if( $result == 1 ){
            $sql = "update userlist set login_times= login_times+1, last_login_time=now()";
            $sql .= " where userName='$user' and userPassword=md5('$pass')";
            $result = $this->_dao->exec( $sql );
            return true;
        }else{
            return false;
        }
    }

    public function CheckAdminInfo($user, $pass){
        $sql = "SELECT * FROM userlist where userName='$user' AND userPassword=md5('$pass')";
        return $this->_dao->GetOneRow( $sql );
    }

    /*
     * 检查拿到的加密过的id/pass，是否能从数据库中成功匹配出
     * */
    public function CheckCookieInfo($id, $pass){
        $sql = "SELECT * FROM userlist WHERE md5(concat(userid,'SALT'))='$id' AND md5(concat(userPassword,'SALT'))='$pass'";
        return $this->_dao->GetOneRow( $sql );
    }

}