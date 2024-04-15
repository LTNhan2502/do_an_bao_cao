<?php
    class admin{
        //Phương thức lấy ra tài khoản admin
        function getAdmin($username, $pass){
            $db = new connect();
            $select = "SELECT id, username, pass FROM admin WHERE admin.username='$username' AND admin.pass=$pass";
            $result = $db->getList($select);
            return $result;
        }
    }
?>