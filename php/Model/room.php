<?php
    class room{
        //Phương thức tìm kiếm
        function searchRoom($value){
            $db = new connect();
            $select = "SELECT * FROM room WHERE room.name LIKE '%$value%'";
            $result = $db->getList($select);
            return $result;
        }
        //Phương thức lấy tất cả thông tin của tất cả các phòng
        function getRoom(){
            $db = new connect();
            $select = "SELECT * FROM room, detail_room, kind WHERE room.id = detail_room.room_id AND room.kind_id = kind.kind_id";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy ra img_main để thêm vào thông tin chi tiết phòng
        function getImgMain($id){
            $db = new connect();
            $select = "SELECT room.img FROM room WHERE room.id = $id";
            $result = $db->getInstance($select);
            return $result;
        }

        //Phương thức thêm thông tin chi tiết cho phòng
        function insertDetailRoom($id, $img_main, $img_sub_1, $img_sub_2, $img_sub_3, $sm, $quantity, $sv, $req, $des){
            $db = new connect();
            $query = "INSERT INTO detail_room VALUES(NULL, $id, '$sv', '$req', '$img_main - $img_sub_1 - $img_sub_2 - $img_sub_3', '$quantity', '$sm', '$des')";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức lấy ra tất cả các phòng thuộc kind single
        function getSingle(){
            $db = new connect();
            $select = "SELECT * FROM room, kind, detail_room WHERE kind.kind_id=room.kind_id AND room.id = detail_room.room_id AND room.kind_id= 1";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy ra tất cả các phòng thuộc family
        function getFamily(){
            $db = new connect();
            $select = "SELECT * FROM room, kind, detail_room WHERE kind.kind_id=room.kind_id AND room.id = detail_room.room_id AND room.kind_id= 2";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy ra tất cả các phòng thuộc kind presidential
        function getPresidential(){
            $db = new connect();
            $select = "SELECT * FROM room, kind, detail_room WHERE kind.kind_id=room.kind_id AND room.id = detail_room.room_id AND room.kind_id= 3";
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
            $select = "SELECT * FROM room WHERE room.deleted_at IS NULL ORDER BY room.id ";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy tất cả các room đã xoá
        function getDeleteRooms(){
            $db = new connect();
            $select = "SELECT * FROM room WHERE room.deleted_at IS NOT NULL";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy tất cả room có phân trang
        function getRoomsPage($start, $limit){
            $db = new connect();
            $select = "SELECT * FROM room ORDER BY room.id LIMIT ".$start.", ".$limit;
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy ra các room chưa đặt
        function getEmptyRoom(){
            $db = new connect();
            $select = "SELECT * FROM room, detail_room WHERE room.id = detail_room.room_id AND room.arrive IS NULL AND room.deleted_at IS NULL AND room.status_id = 1";
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

        //Phương thức thay đổi ảnh chỉnh
        function changeImg($id, $img_main){
            $db = new connect();
            $query = "UPDATE room as r SET r.img = '$img_main' WHERE r.id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức thay đổi ảnh chính và ảnh phụ
        function changeImgName($id, $img_main, $img_name){
            $db = new connect();
            $query = "UPDATE room as r JOIN detail_room as d ON r.id = d.room_id
                      SET r.img = '$img_main', d.img_name = '$img_name' WHERE d.room_id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức thay đổi diện tích
        function changeSM($id, $sm_value){
            $db = new connect();
            $query = "UPDATE detail_room as d SET d.square_meter = '$sm_value' WHERE d.room_id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức thay đổi số khách
        function changeQuantity($id, $quantity_value){
            $db = new connect();
            $query = "UPDATE detail_room as d SET d.quantity = '$quantity_value' WHERE d.room_id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức thêm một tiện ích/yêu cầu/mô tả
        function addDetail($id, $new_sv_name, $col){
            $db = new connect();
            $query = "UPDATE detail_room as d SET d.$col = '$new_sv_name' WHERE d.room_id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức thêm/xoá một tiện ích/yêu cầu/mô tả được chỉ định
        function addOrDeleteDetail($id, $new_name, $col){
            $db = new connect();
            $query = "UPDATE detail_room as d SET d.$col = '$new_name' WHERE d.room_id = $id";
            $result = $db->exec($query);
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

        //Phương thức đóng room ngừng cho thuê
        function deleteRoom($id){
            $db = new connect();
            $query = "UPDATE room SET room.deleted_at = CURRENT_TIMESTAMP WHERE room.id = $id";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức khôi phục room
        function restoreRoom($id){
            $db = new connect();
            $query = "UPDATE room SET room.deleted_at = NULL WHERE room.id = $id";
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

        //Phương thức hiển thị thông tin tất cả phòng đã đặt (trong trang hồ sơ đặt phòng)
        function getBookedRoom(){
            $db = new connect();
            $select = "SELECT * FROM room AS r JOIN customers AS c ON r.id = c.room_id 
                       WHERE r.id = c.room_id AND r.left_at IS NULL AND r.arrive IS NOT NULL 
                            AND r.quit IS NOT NULL AND r.booked_room_id IS NOT NULL AND c.room_id != 0
                            ORDER BY r.id DESC LIMIT 4";
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
            $select = "SELECT * FROM room, customers 
                       WHERE room.id = customers.room_id AND room.left_at IS NOT NULL AND customers.done_session = 1
                       ORDER BY room.id DESC LIMIT 8";
            $result = $db->getList($select);
            return $result;
        }
    }
?>