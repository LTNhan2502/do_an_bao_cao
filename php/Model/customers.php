<?php
    class customers{
        //Phương thức thêm thông tin người dùng
        //Nhớ làm thêm phần check nếu người dùng đã từng đặt phòng 1 lần thì từ lần sau nếu đặt nữa thì hỏi đăng nhập
         //người dùng hoặc đăng nhập để nhận thêm voucher hoặc không đăng nhập, bỏ validate email đã tồn tại đối người đối tượng này
        function addCustomer($name, $email, $tel){
            $db = new connect();
            $query = "INSERT INTO customers(customer_name, email, tel) VALUES('$name', '$email', '$tel')";
            $result = $db->exec($query);
            if($result){
                $customer_id = $db->db->lastInsertId();
                return $customer_id;
            }else{
                return false;
            }
        }

        //Phương thức xác nhận nhận phòng
        function confirmReceive($customer_email){
            $db = new connect();
            $query = "UPDATE customers SET customers.session = 1 WHERE customers.email = '$customer_email'";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức huỷ nhận phòng
        function undoReceive($customer_email){
            $db = new connect();
            $query = "UPDATE customers SET customers.session = 0 WHERE customers.email = '$customer_email'";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức trả phòng
        function confirmLeave($customer_email){
            $db = new connect();
            $query = "UPDATE customers SET customers.done_session = 1, customers.session = 0 WHERE customers.email = '$customer_email'";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức huỷ trả phòng
        function undoLeave($customer_email){
            $db = new connect();
            $query = "UPDATE customers SET customers.done_session = 0, customers.session = 1 WHERE customers.email = '$customer_email'";
            $result = $db->exec($query);
            return $result;
        }
    }
?>