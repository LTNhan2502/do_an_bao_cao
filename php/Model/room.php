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

        //Phương thức lấy kind
        function getKind(){
            $db = new connect();
            $select = "SELECT * FROM kind";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức lấy ra status
        function getStatus(){
            $db = new connect();
            $select = "SELECT * FROM status";
            $result = $db->getList($select);
            return $result;
        }

        //Phương thức thêm room mới vào database
        function createRoom($name, $kind, $price, $sale, $img){
            $db = new connect();
            $query = "INSERT INTO room(id, name, kind_id, price, sale, img) VALUES(NULL, '$name', $kind, $price, $sale, '$img')";
            $result = $db->exec($query);
            return $result;
        }

        //Phương thức lấy ra thông tin của một room thông qua id
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
            $query = "UPDATE room SET room.deleted_at = CURRENT_TIMESTAMP WHERE room.id = $id";
            $result = $db->exec($query);
            return $result;
        }
    }
?>