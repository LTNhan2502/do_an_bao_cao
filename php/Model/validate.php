<?php
    class validate{
        //Phương thức check email_guest đã tồn tại hay chưa
        function checkEmail($email){
            $db = new connect();
            $select = "SELECT COUNT(*) FROM customers WHERE customers.email_guest = '$email'";
            $result = $db->execp($select);
            return $result;
        }

        //Phương thức kiểm tra email đã đăng kí hay chưa
        function checkSignup($email){
            $db = new connect();
            $select = "SELECT COUNT(*) FROM customers as c 
                       WHERE c.password IS NOT NULL AND c.email = '$email'";
            $result = $db->execp($select);
            return $result;
        }

        //Phương thức kiểm tra password có đúng không
        function checkExist($email){
            $db = new connect();
            $select = "SELECT * FROM customers as c WHERE c.email = '$email' AND c.deleted_at IS NULL";
            $result = $db->getInstance($select);
            return $result;
        }
    }
    
?>