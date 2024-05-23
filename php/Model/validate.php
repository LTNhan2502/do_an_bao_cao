<?php
    class validate{
        //Phương thức check email đã tồn tại hay chưa
        function checkEmail($email){
            $db = new connect();
            $select = "SELECT COUNT(*) FROM customers WHERE customers.email = '$email'";
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
        function checkPassword($email, $password){
            $db = new connect();
            $select = "SELECT * FROM customers as c WHERE c.email = '$email' AND c.password = '$password'";
            $result = $db->getList($select);
            return $result;
        }
    }
    
?>