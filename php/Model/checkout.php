<?php
    class checkout{
        //Phương thức reset thông tin sau khi thanh toán
        function resetAfterCheckout($booked_room_id){
            $db = new connect();
            $query = "UPDATE room AS r 
                        JOIN customers AS c ON r.id = c.room_id 
                      SET r.booked_room_id = NULL, r.arrive = NULL, r.quit = NULL, r.left_at = NULL, c.done_session = 0, c.sum =  NULL, c.room_id = 0
                      WHERE r.id = c.room_id AND r.booked_room_id = '$booked_room_id'";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức lưu thông tin vào checkout
        function doCheckout($booked_room_id, $customer_booked_id, $customer_email, $bill_price, $bill_arrive, $bill_leave, $bill_checkout_at, $room_name, $customer_name, $customer_tel){
            $db = new connect();
            $query = "INSERT INTO bill VALUES (NULL, '$booked_room_id', '$customer_booked_id', '$customer_email', $bill_price, '$bill_arrive','$bill_leave', '$bill_checkout_at', '$room_name', '$customer_name', '$customer_tel')";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức hiển thị tất cả bill không dùng phân trang
        function getBill(){
            $db = new connect();
            $select = "SELECT * FROM bill";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức hiển thị tất cả bill dùng phân trang
        function getBillPage($start, $limit){
            $db = new connect();
            $select = "SELECT * FROM bill ORDER BY bill.bill_id DESC LIMIT ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        }
    }
?>