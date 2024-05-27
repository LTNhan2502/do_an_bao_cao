<?php
    set_include_path(get_include_path() . PATH_SEPARATOR . '../../Model/');
    spl_autoload_extensions('.php');    
    spl_autoload_register();


    $act = "booking";
    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    }
    switch ($act) {
        case "booking":
            include_once "View/user/booking.php";
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
            //Kiểm tra tồn tại email_guest
            $exist = $validate->checkEmail($email);//Bên model chỉ trả về câu lệnh SQL
            $exist->execute();//Thực thi câu lệnh SQL ở trên
            //Kiểm tra đăng kí email
            $signup = $validate->checkSignup($email);
            $signup->execute();
            //Trả về số cột
            $countExist = $exist->fetchColumn();
            $countSignup = $signup->fetchColumn();

           
            $res = array(
                'countExist' => $countExist,
                'countSignup' => $countSignup
            );
            echo json_encode($res);
            break;
        case 'book_room':
            if(isset($_POST['select_room']) && isset($_POST['name']) && isset( $_POST['email_guest']) && isset($_POST['tel']) &&
             isset($_POST['from']) && isset($_POST['to']) && isset($_POST['stay_sum']) && isset($_POST['act'])){
                $id = $_POST['select_room'];
                $name = $_POST['name'];
                $email_guest = $_POST['email_guest'];
                $tel = $_POST['tel'];
                $arrive = $_POST['from'];
                $quit = $_POST['to'];
                $stay_sum = $_POST['stay_sum'];
                $act = $_POST['act'];
                $col = 'room_id';
                $col_history = 'history';
                $col_member = 'email'; 
                $col_guest = 'email_guest';
                $room = new room();
                $customers = new customers(); 
                $result_room = $room->updateTime($id, $arrive, $quit);

                //Nếu là khách và là lần đầu tiên đặt phòng
                if($act == 0){
                    $customer_id = $customers->addCustomer($name, $email_guest, $tel);    
                    //Nhớ chỉnh lại addRoomID check phòng đã đưa vào hoạt động
                    if($result_room && $customer_id){
                        $booked_room = $room->addRoomID($id, $customer_id, $col);
                        $customer = $customers->getLastInsert();
                        $customer_id = $customer['customer_id'];
                        $customer_sum = $customers->updateSum($stay_sum, $customer_id);
    
                        if($booked_room && $customer_sum){
                            $res = array(
                                "status" => "success",
                                "message" => "Đặt phòng thành công!",
                                "customer_id" => $customer_id,
                                "sum"=> $customer_sum
                            );
                        }else{
                            $res = array(
                                "status" => "booked sum",
                                "message" => "Booked_room hoặc customer_sum gặp lỗi!",
                            );
                        }                    
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Chưa thêm KH hoặc chưa chỉnh sửa lại thời gian trong room!",
                            "customer_id" => $customer_id
                        );
                    }
                }
                //Nếu là khách và là guest (đã từng đặt phòng)                
                else if($act == 1){
                    $customer = $customers->updateGuest($name, $email_guest, $tel); 
                    $cust = $customers->getCustomer($email_guest, $col_guest); 
                    $customer_id = $cust['customer_id'];
                    if($result_room && $customer){
                        //Thêm id của phòng vào room_id của customer
                        if($cust['history'] == null){
                            $id_history = $id;
                        }else{
                            $id_history = $cust['history'].' - '.$id;
                        }
                        $booked_room = $room->addRoomID($id, $customer_id, $col);
                        $booked_history = $room->addRoomID($id_history, $customer_id, $col_history);
                        $customer_sum = $customers->updateSum($stay_sum, $customer_id);

                        //Đặt phòng 1 lần xong rồi đặt tiếp bằng email_guest sẽ phải thay đổi lại thông tin của phòng cũ đã đặt (set null)
    
                        if($booked_room && $customer_sum){
                            $res = array(
                                "status" => "success",
                                "message" => "Đặt phòng thành công!",
                                "customer_id" => $customer_id,
                                "sum"=> $customer_sum
                            );
                        }else{
                            $res = array(
                                "status" => "booked sum",
                                "message" => "Booked_room hoặc customer_sum gặp lỗi!",
                            );
                        }                    
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Chưa thêm KH hoặc chưa chỉnh sửa lại thời gian trong room!",
                            "customer_id" => $customer_id
                        );
                    }
                }
                //Nếu khách là member                
                else if($act == 2){
                    $customer = $customers->updateMember($email_guest); 
                    $cust = $customers->getCustomer($email_guest, $col_member); 
                    $customer_id = $cust['customer_id'];  
                    if($result_room && $customer){
                        //Thêm id của phòng vào room_id, history của customer và tính sum
                        if($cust['history'] == null){
                            $id_history = $id;
                        }else{
                            $id_history = $cust['history'].' - '.$id;
                        }
                        $booked_room = $room->addRoomID($id, $customer_id, $col);
                        $booked_history = $room->addRoomID($id_history, $customer_id, $col_history);
                        $customer_sum = $customers->updateSum($stay_sum, $customer_id);
    
                        if($booked_room && $customer_sum && $booked_history){
                            $res = array(
                                "status" => "success",
                                "message" => "Đặt phòng thành công!",
                                "customer_id" => $customer_id,
                                "sum"=> $customer_sum
                            );
                        }else{
                            $res = array(
                                "status" => "booked sum",
                                "message" => "Booked_room hoặc customer_sum hoặc history gặp lỗi!",
                            );
                        }                    
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Chưa thêm KH hoặc chưa chỉnh sửa lại thời gian trong room!",
                            "customer_id" => $customer_id
                        );
                    }
                }
                echo json_encode($res);
            }   
            break;
        case "update_sum":
            $stay_sum =  $_POST['stay_sum'];
            $customers = new customers();
            $customer = $customers->getLastInsert();
            $customer_id = $customer['customer_id'];
            $customer_sum = $customers->updateSum($stay_sum, $customer_id);
            // print_r($customer_sum);exit;
            if($customer_sum){
                $res = array(
                    'status' => 'success',
                    'message'=> 'Tổng tiền đã có!'
                );
            }else{
                $res = array(
                    'status'=> 'fail',
                    'message'=> 'Tổng tiền chưa có!'
                );
            }
            echo json_encode($res);
            break;
    }
?>