<?php
    set_include_path(get_include_path() . PATH_SEPARATOR . '../../Model/');
    spl_autoload_extensions('.php');    
    spl_autoload_register();


    $act = "admin_room_book";
    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    }
    switch ($act) {
        case "admin_room_book":
            include_once "View/admin/admin_room_book.php";
            break;
        case "show_detail":
            $id = $_GET['value_id'];
            $room = new room();
            $result = $room->getDetailRooms($id);
            $results = array();
            //fetchAll(): Thực hiện câu lệnh SQL ở trên và trả ra mảng kết hợp [{...}] => cần truy cập vào mảng -> đối tượng
            //fetch(): Thực hiện câu lệnh SQL ở trên và trả ra đối tượng
            $results = $result->fetch(PDO::FETCH_ASSOC);
            echo json_encode($results); //Chuyển thành kiểu JSON trả về cho AJAX
            break;
    }
?>