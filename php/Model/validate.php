<?php
    class validate{
        //Phương thức check email
        function checkEmail($email){
            $db = new connect();
            $select = "SELECT COUNT(*) FROM customers WHERE customers.email = '$email'";
            $result = $db->execp($select);
            return $result;
        }
    }
    
?>