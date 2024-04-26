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
            if(isset($_GET["value_id"])){
                $id = $_GET['value_id'];
                $room = new room();
                $result = $room->getDetailRooms($id);
                $results = array();
                //fetchAll(): Thực hiện câu lệnh SQL ở trên và trả ra mảng kết hợp [{...}] => cần truy cập vào mảng -> đối tượng
                //fetch(): Thực hiện câu lệnh SQL ở trên và trả ra đối tượng
                $results = $result->fetch(PDO::FETCH_ASSOC);
                echo json_encode($results); //Chuyển thành kiểu JSON trả về cho AJAX
            }
            if(isset($_GET['service_id'])){
                $id = $_GET['service_id'];
                $room = new room();
                $result = $room->getDetailRooms($id);
                $results = array();
                //fetchAll(): Thực hiện câu lệnh SQL ở trên và trả ra mảng kết hợp [{...}] => cần truy cập vào mảng -> đối tượng
                //fetch(): Thực hiện câu lệnh SQL ở trên và trả ra đối tượng
                $results = $result->fetch(PDO::FETCH_ASSOC);
                echo json_encode($results); //Chuyển thành kiểu JSON trả về cho AJAX
            }            
            break;
        case 'check_email':
            $email = $_POST['email'];
            $validate = new validate();
            $smtp = $validate->checkEmail($email);//Bên model chỉ trả về câu lệnh SQL
            $smtp->execute();//Thực thi câu lệnh SQL ở trên
            $count = $smtp->fetchColumn();//Trả về số cột
            echo json_encode($count);
            break;
        case 'book_room':
            if(isset($_POST['id']) && isset($_POST['name']) && isset( $_POST['email']) && 
            isset($_POST['tel']) && isset($_POST['from_time']) && isset($_POST['to_time'])){
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $arrive = $_POST['from_time'];
                $quit = $_POST['to_time'];
                $room = new room();
                $customer = new customers(); 
                $result_room = $room->updateTime($id, $arrive, $quit);
                $customer_id = $customer->addCustomer($name, $email, $tel);
                // print_r($customer_id);exit;

                //Nhớ chỉnh lại addRoomID check phòng đã đưa vào hoạt động

                if($result_room && $customer_id){
                    $booked_room = $room->addRoomID($id, $customer_id);
                    $res = array(
                        "status" => "success",
                        "message" => "Đặt phòng thành công!",
                        "customer_id" => $customer_id
                    );
                }else{
                    $res = array(
                        "status" => "fail",
                        "message" => "Chưa thêm KH hoặc chưa chỉnh sửa lại thời gian trong room!",
                        "customer_id" => $customer_id
                    );
                }
                echo json_encode($res);
            }   
            break;
    }
?>