<?php
    class room{
        //Phương thức lấy tất cả thông tin của phòng
        function getRoom(){
            $db = new connect();
            $select = "SELECT * FROM room, room_detail, facility, function WHERE room.id = room_detail.id";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy ra tất cả các phòng thuộc kind
        function getSingle(){
            $db = new connect();
            $select = "SELECT * FROM room, kind WHERE kind.kind_id=room.kind_id AND kind.kind_id= 1";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy 1 room
        function getDetailRoom($id){
            $db = new connect();
            $select = "SELECT * FROM detail_room, room WHERE room.id = detail_room.detail_id AND detail_room.room_id = $id";
            $result = $db->getInstance($select);
            return $result;
        }

        //Phương thức lấy tất cả room
        function getRooms(){
            $db = new connect();
            $select = "SELECT * FROM room ";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy ra cácc room chưa đặt
        function getEmptyRoom(){
            $db = new connect();
            $select = "SELECT * FROM room WHERE room.arrive IS NULL AND room.status_id = 1";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy ra chi tiết một room (admin)
        function getDetailRooms($id){
            $db = new connect();
            $select = "SELECT * FROM room, detail_room WHERE room.id = detail_room.room_id AND room.id = $id";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy ra tất cả detail_room
        function getDetail_room(){
            $db = new connect();
            $select = "SELECT * FROM detail_room";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy ra tất cả, như getDetailRooms nhưng không cần ID
        function getAllDetailRoom(){
            $db = new connect();
            $select = "SELECT * FROM room, detail_room WHERE room.id = detail_room.room_id";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức thay đổi name
        function changeName($id, $value_name){
            $db = new connect();
            $query = "UPDATE room SET room.name = '$value_name' WHERE room.id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức lấy kind
        function getKind(){
            $db = new connect();
            $select = "SELECT * FROM kind";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức thay đổi kind
        function changeKind($id, $kind_id){
            $db = new connect();
            $query = "UPDATE room SET room.kind_id = $kind_id WHERE room.id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức thay đổi price
        function changePrice($id, $price_value){
            $db = new connect();
            $query = "UPDATE room SET room.price = $price_value WHERE room.id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức thay đổi sale
        function changeSale($id, $sale_value){
            $db = new connect();
            $query = "UPDATE room SET room.sale = $sale_value WHERE room.id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức lấy ra status
        function getStatus(){
            $db = new connect();
            $select = "SELECT * FROM status";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức thêm room mới vào database (thêm chi tiết)
        function createRoom($name, $kind, $price, $sale, $status_id, $img){
            $db = new connect();
            $query = "INSERT INTO room(id, name, kind_id, price, sale, status_id, img) VALUES(NULL, '$name', $kind, $price, $sale, $status_id, '$img')";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức lấy ra thông tin của một room thông qua id (xem chi tiết)
        function getRoomID($id){
            $db = new connect();
            $select = "SELECT * FROM room WHERE room.id = $id";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức chỉnh sửa thông tin
        function updateRoom($id, $name, $kind_id, $price, $sale, $status_id, $img){
            $db = new connect();
            $query = "UPDATE room SET name = '$name', kind_id = $kind_id, price = $price, sale = $sale, status_id = $status_id, img = '$img' WHERE room.id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức đưa room vào diện trống, có thể đặt room
        function setEmpty($id){
            $db = new connect();
            $query = "UPDATE room SET room.status_id = 1 WHERE room.id = '$id'";
            $result = $db->execp($query);   //Hiển thị ra câu lệnh và đưa nó qua cho controller
            return $result;
        }

        //Phương thức đưa room vào diện đầy
        function moveRoom($id){
            $db = new connect();
            $query = "UPDATE room SET room.status_id = 2 WHERE room.id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức đưa room vào quá trình bảo trì, nâng cấp, trùng tu
        function maintainRoom($id){
            $db = new connect();
            $query = "UPDATE room SET room.status_id = 3 WHERE room.id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức set room trống
        function restoreRoom($id){
            $db = new connect();
            $query = "UPDATE room SET room.isEmpty = 0 WHERE room.id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức đóng room ngừng cho thuê
        function deleteRoom($id){
            $db = new connect();
            $query = "UPDATE room SET room.left_at = CURRENT_TIMESTAMP WHERE room.id = $id";
            $result = $db->exec($query);
            return $result;
        }

        
        //Phương thức đặt phòng
        function bookRoom($id){
            $db = new connect();
            $query = "";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức lấy ra thông tin khách hàng đã đặt phòng và chi tiết phòng đã đặt
        // function getBookdedRoom(){
        //     $db = new connect();
        //     $select = "";
        //     $result = $db->exec($select);
        //     return $result;
        // }

        //Phương thức set thời gian nhận/trả phòng và set full cho room
        function updateTime($id, $arrive, $quit){
            $db = new connect();
            $str = "ORD_";
            $random = rand(0, 99999999);
            $str_rand = $str . $random;
            $query = "UPDATE room SET room.arrive = '$arrive', room.quit = '$quit', room.status_id = 2, room.booked_room_id = '$str_rand' WHERE room.id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức thêm id của phòng đã đặt vào customers (đặt phòng)
        function addRoomID($id, $customer_id){
            $db = new connect();
            $select = "UPDATE customers SET customers.room_id = $id WHERE customers.customer_id = $customer_id";
            $result = $db->exec($select);
            return $result;
        }      

        //Phương thức hiển thị thông tin tất cả phòng đã đặt
        function getBookedRoom(){
            $db = new connect();
            $select = "SELECT * FROM room AS r JOIN customers AS c ON r.id = c.room_id WHERE r.id = c.room_id AND r.left_at IS NULL AND r.arrive IS NOT NULL AND r.quit IS NOT NULL AND r.booked_room_id IS NOT NULL AND c.room_id != 0";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức thu hồi phòng đã đặt
        function undoBookedRoom($booked_room_id){
            $db = new connect();
            $query = "UPDATE room SET room.left_at = CURRENT_TIMESTAMP, room.status_id = 1 WHERE room.booked_room_id = '$booked_room_id'";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức lấy ra tất cả các phòng đã thu hồi đặt
        function getUndoRoom(){
            $db = new connect();
            $select = "SELECT * FROM room, customers WHERE room.id = customers.room_id AND room.left_at IS NOT NULL AND customers.done_session = 1";
            $result = $db->getList($select);
            return $result;
        }
    }
?>