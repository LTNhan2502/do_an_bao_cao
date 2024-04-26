<?php
    set_include_path(get_include_path() . PATH_SEPARATOR . '../../Model/');
    spl_autoload_extensions('.php');    
    spl_autoload_register();

    $act = "admin_room_check";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'admin_room_check':
            include_once "View/admin/admin_room_check.php";
            break;
        case "approve_arrive":
            if(isset($_POST['customer_email'])){
                $customer_email = $_POST['customer_email'];
                // print_r($customer_email);exit;

                $customer = new customers(); 
                $receive = $customer->confirmReceive($customer_email);
                // print($receive);exit;
                if($receive){
                    $res = array(
                        "status" => "success",
                        "message" => "Xác nhận thành công!"
                    );
                }else{
                    $res = array(
                        "status" => "fail",
                        "message" => "Hàm confirmReceive gặp vấn đề!"
                    );
                }
                echo json_encode($res);
            }
            break;
        case "undo_approve_arrive":
            if(isset($_POST['customer_email'])){
                $customer_email = $_POST['customer_email'];
                // print_r($customer_email);exit;

                $customer = new customers(); 
                $receive = $customer->undoReceive($customer_email);
                // print($receive);exit;
                if($receive){
                    $res = array(
                        "status" => "success",
                        "message" => "Huỷ nhận phòng thành công!"
                    );
                }else{
                    $res = array(
                        "status" => "fail",
                        "message" => "Hàm undoReceive gặp vấn đề!"
                    );
                }
                echo json_encode($res);
            }
            break;
        case "approve_leave":
            if(isset($_POST['customer_email'])){
                $customer_email = $_POST['customer_email'];
                // print_r($customer_email);exit;

                $customer = new customers(); 
                $receive = $customer->confirmLeave($customer_email);
                // print($receive);exit;
                if($receive){
                    $res = array(
                        "status" => "success",
                        "message" => "Xác nhận thành công!"
                    );
                }else{
                    $res = array(
                        "status" => "fail",
                        "message" => "Hàm confirmLeave gặp vấn đề hoặc do id của thẻ!"
                    );
                }
                echo json_encode($res);
            }
            break;
        case "undo_approve_leave":
            if(isset($_POST['customer_email'])){
                $customer_email = $_POST['customer_email'];
                // print_r($customer_email);exit;

                $customer = new customers(); 
                $receive = $customer->undoLeave($customer_email);
                // print($receive);exit;
                if($receive){
                    $res = array(
                        "status" => "success",
                        "message" => "Huỷ trả phòng thành công!"
                    );
                }else{
                    $res = array(
                        "status" => "fail",
                        "message" => "Hàm undoLeave gặp vấn đề hoặc do id của thẻ!"
                    );
                }
                echo json_encode($res);
            }
            break;
        case "undo_book":
            if(isset($_POST["booked_room_id"])){
                $booked_room_id = $_POST["booked_room_id"];
                $room = new room();
        
                $undo = $room->undoBookedRoom($booked_room_id);
                if ($undo) {
                    $res = [
                        'status' => 'success',
                        'message' => "Hãy vào hồ sơ đặt phòng để xem!"
                    ];
                } else {
                    $res = array(
                        "status" => "fail",
                        "message" => "Xem lại hàm undoBookedRoom, left_at, url, id thẻ!"
                    );
                }
                echo json_encode($res);
            }
            break;   
    }
            
        
?>