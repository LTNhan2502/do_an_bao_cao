<?php
    class customers{
        //Phương thức thêm thông tin người dùng
        //Nhớ làm thêm phần check nếu người dùng đã từng đặt phòng 1 lần thì từ lần sau nếu đặt nữa thì hỏi đăng nhập
         //người dùng hoặc đăng nhập để nhận thêm voucher hoặc không đăng nhập, bỏ validate email đã tồn tại đối người đối tượng này
        function addCustomer($name, $email, $tel){
            $db = new connect();
            $str = "CTM_";
            $random = rand(0, 99999999);
            $str_rand = $str.$random;
            $query = "INSERT INTO customers(customer_booked_id, customer_name, email, tel) VALUES('$str_rand', '$name', '$email', '$tel')";
            $result = $db->exec($query);
            if($result){
                $customer_id = $db->db->lastInsertId();
                return $customer_id;
            }else{
                return false;
            }
        }

        //Phương thức lấy ra dòng dữ liệu mới nhất của customers
        function getLastInsert(){
            $db = new connect();
            $select = "SELECT * FROM customers ORDER BY customer_id DESC LIMIT 1";
            $result = $db->getInstance($select);
            return $result;
        }

        //Phương thức cập nhật lại sum của customer
        function updateSum($stay_sum, $customer_id){
            $db = new connect();
            $query = "UPDATE customers SET customers.sum = $stay_sum WHERE customers.customer_id = $customer_id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức xác nhận nhận phòng
        function confirmReceive($customer_booked_id){
            $db = new connect();
            $query = "UPDATE customers SET customers.session = 1 WHERE customers.customer_booked_id = '$customer_booked_id'";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức huỷ nhận phòng
        function undoReceive($customer_booked_id){
            $db = new connect();
            $query = "UPDATE customers SET customers.session = 0 WHERE customers.customer_booked_id = '$customer_booked_id'";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức trả phòng
        function confirmLeave($customer_booked_id){
            $db = new connect();
            $query = "UPDATE customers SET customers.done_session = 1, customers.session = 0 WHERE customers.customer_booked_id = '$customer_booked_id'";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức huỷ trả phòng
        function undoLeave($customer_booked_id){
            $db = new connect();
            $query = "UPDATE customers SET customers.done_session = 0, customers.session = 1 WHERE customers.customer_booked_id = '$customer_booked_id'";
            $result = $db->exec($query);
            return $result;
        }
    }
?>