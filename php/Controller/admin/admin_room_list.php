<?php
    set_include_path(get_include_path().PATH_SEPARATOR.'../../Model/');
    spl_autoload_extensions('.php');
    spl_autoload_register();

    $act = "admin_room_list";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }
    switch($act){
        case "admin_room_list":
            include_once "View/admin/admin_room_list.php";
            break;
        case "create_room":
            include_once "View/admin/admin_room_insert.php";
            break;
        case "create_action":            
            if(isset($_POST['name']) || isset($_POST['kind']) || isset($_POST['price']) || isset($_POST['sale'])
                || isset($_POST['status_id']) || isset($_POST['img'])){
                $name = $_POST['name'];
                $kind = $_POST['kind'];
                $price = $_POST['price'];
                $sale = $_POST['sale'];
                $status_id = $_POST['status_id'];
                $img = $_FILES['img']['name'];
                $room = new room();
                $result = $room->createRoom($name, $kind, $price, $sale, $status_id, $img); 
                if ($result) {                 
                    $res = array(
                        'status' => 'success',
                        'message' => 'Tạo mới thành công!'
                    ); 
                    // echo '<meta http-equiv="refresh" content="0;url=./admin_index.php?action=admin_room_list&act=room_create"/>';
                }else{ 
                    $res = array(
                        'status' => 'fail',
                        'message'=> 'Tạo mới thất bại!'
                    );        
                    // echo '<meta http-equiv="refresh" content="0;url=./admin_index.php?action=admin_room_list&act=room_create"/>';
                }
                echo json_encode($res);
            }
            break;
        case "update_room":
            include_once "View/admin/admin_room_insert.php";
            break;
        case "set_empty":            
            $id = $_POST['id'];
            $room = new room();
            $empty = $room->setEmpty($id); //$empty trả về đoạn lệnh sql
            $result = $empty->execute(); //$result thực hiện đoạn lệnh sql trên
            // print_r($result);exit; 
            if($result !== false){ // Kiểm tra xem execute() đã trả về một giá trị object hay không                
                $res = array(
                    "status" => "success",
                    "message" => "Changed"
                );                
            } else {
                $res = array(
                    "status" => "fail",
                    "message" => "Lenh SQL, kieu du lieu(JSON), json_encode, value view"
                );
            }
            echo json_encode($res);
                     
            break;
        case "set_full":            
            $id = $_POST['id'];
            $room = new room();
            $result = $room->moveRoom($id);
            // print_r($result);exit;
            if($result){
                $res = array(
                    "status" => "success",
                    "message" => "Changed"
                );
            }else{
                $res = array(
                    "status" => "fail",
                    "message" => "Lenh SQL, kieu du lieu(JSON), json_encode, value view"
                );
                // include_once "View/admin/admin_room_list.php";
            }
            echo json_encode($res);
            break; 
        case "maintain":
            
            $id = $_POST['id'];
            $room = new room();
            $maintain = $room->maintainRoom($id);

            if($maintain){
                $res = array(
                    "status" => "success",
                    "message" => "Changed"
                );
            }else{
                $res = array(
                    "status" => "success",
                    "message" => "Lenh SQL, kieu du lieu(JSON), json_encode, value view"
                );
            }
            echo json_encode($res);
            break; 
        case "Single":
            $id = $_POST['id'];
            $Kind_id = $_POST['kind_id'];
            $room = new room();
            $result = $room->changeKind($id, $Kind_id);
            // print_r($result);exit;
            if($result){
                $res = array(
                    "status" => "success",
                    "message" => "changed"
                );
            }else{
                $res = array(
                    "status" => "fail",
                    "message" => "Lenh SQL, kieu du lieu(JSON), json_encode, value view"
                );
            }
            echo json_encode($res);
            break;
        case "Family":
            $id = $_POST['id'];
            $kind_id = $_POST['kind_id'];
            $room = new room();
            $result = $room->changeKind($id, $kind_id);
            if($result){
                $res = array(
                    "status" => "success",
                    "message" => "changed"
                );
            }else{
                $res = array(
                    "status" => "fail",
                    "message" => "Lenh SQL, kieu du lieu (JSON), json_encode, value view"
                );
            }
            echo json_encode($res);
            break;
        case "Presidential":
            $id = $_POST['id'];
            $kind_id = $_POST['kind_id'];
            $room = new room();
            $result = $room->changeKind($id, $kind_id);
            if($result){
                $res = array(
                    "status" => "success",
                    "message" => "changed"
                );
            }else{
                $res = array(
                    "status" => "fail",
                    "message" => "Lenh SQL, kieu du lieu (JSON), json_encode, value view"
                );
            }
            echo json_encode($res);
            break;
        case "update_name":
            if(isset($_POST['name_value']) && isset($_POST['id'])){
                $id = $_POST['id'];
                $name_value = $_POST['name_value'];
                $regex_name = '/^[a-zA-Z\s]+$/';
                if(!preg_match($regex_name, $name_value)){
                    $res = array(
                        'status' => 'name',
                        'message' => 'Tên không được bao gồm kí tự đặc biệt và số!'
                    );
                }else if($name_value == ''){
                    $res = array(
                        'status'=> 'name',
                        'message'=> 'Không được để trống!'
                    );
                }else if(strlen($name_value) < 2 || strlen($name_value) > 30){
                    $res = array(
                        'status'=> 'name',
                        'message'=> 'Tên phải từ 2 đến 30 kí tự!'
                    );
                }else{
                    $room = new room();
                    $result = $room->changeName($id, $name_value);
                    if($result){
                        $res = array(
                            "status" => "success",
                            "message" => "changed"
                        );
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Lenh SQL, kieu du lieu (JOSN), json_encode, value view"
                        );
                    }
                }
                
                echo json_encode($res);
            }
            break;
        case "update_price":
            if(isset($_POST['price_value']) && isset($_POST['id']) && isset($_POST['sale_value'])){
                $id = $_POST['id'];
                $price_value = $_POST['price_value'];
                $sale_value = $_POST['sale_value'];
                if(!is_numeric($price_value)){
                    $res = array(
                        'status'=> 'price',
                        'message'=> 'Giá phải là một số!',
                    );
                }else if($price_value < $sale_value){
                    $res = array(
                        'status'=> 'price',
                        'message'=> 'Giá phải lớn hơn giảm giá!'
                    );
                }else if($price_value == ''){
                    $res = array(
                        'status'=> 'price',
                        'message'=> 'Không được để trống!'
                    );
                }else{
                    $room = new room();
                    $result = $room->changePrice($id, $price_value);
                    if($result){
                        $res = array(
                            "status" => "success",
                            "message" => "changed"
                        );
                    }else{
                        $res = array(
                            "status" => "fail",
                            "message" => "Lenh SQL, kieu du lieu (JSON), json_encode, value view"
                        );
                    }
                }
                echo json_encode($res);
            }
            break;
        case "update_sale":
            if(isset($_POST['id']) && isset($_POST['sale_value']) && isset($_POST['price_value'])){
                $id = $_POST['id'];
                $sale_value = $_POST['sale_value'];
                $price_value = $_POST['price_value'];
                $room = new room();
                
                if($sale_value > $price_value){
                    $res = array(
                        'status'=> 'sale',
                        'message' => 'Giảm giá phải nhỏ hơn giá!',
                    );
                }else if($sale_value == ''){
                    $res = array(
                        'status'=> 'sale',
                        'message' => 'Không được để trống!'
                    );
                }else if(!is_numeric($sale_value)){
                    $res = array(
                        'status' => 'sale',
                        'message' => 'Giảm giá phải là một số!',
                    );
                }else if($sale_value < $price_value && $sale_value != ''){
                    $result = $room->changeSale($id, $sale_value);
                    if($result){
                        $res = array(
                            'status'=> 'success',
                            'message'=> 'Thay đổi thành công!'
                        );
                    }else{
                        $res = array(
                            'status'=> 'fail',
                            'message'=> 'Thay đổi thất bại!'
                        );
                    }
                }               
                echo json_encode($res);
            }
            break;
        case "detail":
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $room = new room();
                $detail =  $room->getDetailRooms($id);
                $results = $detail->execute();
                if($result){
                    $result = $results;
                }else{
                    $result = 0;
                };
                echo json_encode($result);
            }
            
            break;
        case "pages":
            if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['page'])){
                //Phân trang
                $room = new room();
                $limit = 6; //Giới hạn số bill trong 1 trang
                $page = new page();
                $start = $page->findStart($limit); //Lấy được sản phẩm bắt đầu trong 1 trang
                $result = $room->getRoomsPage($start, $limit);
                $res = $result->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($res);
            }  
            break;
    }
?>