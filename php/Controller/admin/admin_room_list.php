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
        case 'admin_room_restore':
            include_once "View/admin/admin_room_restore.php";
            break;
        case "delete_room":
            if(isset($_POST["delete_room_id"])){
                $id = $_POST["delete_room_id"];
                $room = new room();
                $delete = $room->deleteRoom($id);
                if($delete){
                    $res = array(
                        "status"=> "success",
                        "message"=> "Xoá thành công! Có thể vào Khôi phục để xem!"
                    );
                }else{
                    $res = array(
                        "status"=> "fail",
                        "message"=> "Xoá thất bại! Kiểm tra lại!"
                    );
                }
                echo json_encode($res);
            }
            break;
        case "restore_room":
            if(isset($_POST["restore_room_id"])){
                $id = $_POST["restore_room_id"];
                $room = new room();
                $restore = $room->restoreRoom($id);
                if($restore){
                    $res = array(
                        "status"=> "success",
                        "message"=> "Khôi phục thành công!"
                    );
                }else{
                    $res = array(
                        "status"=> "fail",
                        "message"=> "Khôi phục thất bại! Kiểm tra lại!"
                    );
                }
                echo json_encode($res);
            }
            break;
        case "create_detail":
            include_once "View/admin/admin_room_create.php";
            break;
        case "create_detail_action";
            $room = new room();
            $id = $_POST['id_create'];
            $img_sub_1 = $_FILES['img_sub_1']['name'];
            $img_sub_2 = $_FILES['img_sub_2']['name'];
            $img_sub_3 = $_FILES['img_sub_3']['name'];
            $sm = $_POST['square_meter_create'];
            $quantity = $_POST['quantity_create'];
            $sv = $_POST['service_create'];
            $req = $_POST['requirement_create'];
            $des = $_POST['description_create'];

            //Lấy img_main từ table room
            $getImgMain = $room->getImgMain($id);
            $img_main = $getImgMain['img'];
            $insert = $room->insertDetailRoom($id, $img_main, $img_sub_1, $img_sub_2, $img_sub_3, $sm, $quantity, $sv, $req, $des);
            if($insert){
                $res = array(
                    'status' => 200,
                    'message' => 'Thêm chi tiết phòng thành công!'
                );
            }else{
                $res = array(
                    'status' => 403,
                    'message' => 'Thêm chi tiết phòng thất bại!'
                );
            }
            echo json_encode($res);
            break;
        case "check_img":
            if(!empty($_FILES['file'])){
                $res = array('status', 'message', 'data');  
                //đường link chứa ảnh
                $target_dir="../../Content/images/";
                //lấy tên hình
                $target_file=$target_dir.basename($_FILES['file']["name"]);
                //biến phần mở rộng của file thành chữ thường
                $imageFileType=strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));
                //type file allow                
                $type_fileAllow=array('png','jpg','jpeg','gif');
                //kích thước file
                $size_file=$_FILES['file']['size'];
                //kiểm tra type file
                if(in_array($imageFileType,$type_fileAllow)){
                    if($size_file<=5542880){                        
                        $res['status'] = 200;
                        $res['message'] = 'Upload thành công!';
                        $res['data'] = 'Content/images/'.$_FILES['file']['name'];
                        echo json_encode($res);                        
                    }
                    else{
                        // echo 'assets/images/image.jpg';
                        $res['status'] = 403;
                        $res['message'] = 'File được chọn không được quá 5MB!';
                        $res['data'] = Null;
                        echo json_encode($res);
                    }
                }else{
                    $res['status'] = 404;
                    $res['message'] = 'File này không được hỗ trợ, bạn vui lòng chọn hình ảnh';
                    $res['data'] = Null;
                    echo json_encode($res);
                }
            }
            break;
        case "change_detail_img":
            if(isset($_POST['id']) && isset($_FILES['img_main'])  && 
                isset($_FILES['img_sub_1']) && isset($_FILES['img_sub_2']) && isset($_FILES['img_sub_3'])){
                $id = $_POST['id'];
                $img_main = $_FILES['img_main']['name'];
                $img_sub_1 = $_FILES['img_sub_1']['name'];
                $img_sub_2 = $_FILES['img_sub_2']['name'];
                $img_sub_3 = $_FILES['img_sub_3']['name'];                
                
                $room = new room();
                $detail_room = $room->getDetailRooms($id);
                $img_name = "$img_main - $img_sub_1 - $img_sub_2 - $img_sub_3";
                $change = $room->changeImgName($id, $img_main, $img_name);
                if($change){
                    $res['status'] = 200;
                    $res['message'] = 'Thay đổi toàn bộ ảnh thành công!';
                    echo json_encode($res);
                }else{
                    $res['status'] = 403;
                    $res['message'] = 'Không thể thay đổi ảnh!';
                    echo json_encode($res);
                }  
            }
            break;
        case "edit_detail":
            include_once "View/admin/admin_room_edit.php";
            break;
        case "change_sm":
            if(isset($_POST['id']) && isset($_POST['sm_value'])){
                $id = $_POST['id'];
                $sm_value = $_POST['sm_value'];
                $room = new room();
                $detail_room = $room->getDetailRooms($id);

                if($detail_room){
                    $detail = $detail_room->fetch();
                    $sm = $detail['square_meter'];
                    $change = $room->changeSM($id, $sm_value);

                    if($change){
                        $res = array(
                            'status' => 200,
                            'message' => "Diện tích phòng đã được cập nhật!",
                            'data' => $sm_value
                        );
                        echo json_encode($res);
                    }else if($sm_value == $sm_value){
                        $res = array(
                            'status' => "duplicate",
                            'message' => "Nếu muốn cập nhật, hãy chọn diện tích phòng khác!",
                            'data' => $sm_value
                        );
                        echo json_encode($res);
                    }else{
                        $res = array(
                            'status' => 403,
                            'message' => "Không thể cập nhật diện tích phòng!",
                            'data' => $sm_value
                        );
                        echo json_encode($res);
                    }
                }else{
                    $res = array(
                        'status' => 404,
                        'message' => "Lỗi lấy dữ liệu phòng!",
                        'data' => $sm_value
                    );
                    echo json_encode($res);
                }
            }
            break;
        case "change_quantity":
            if(isset($_POST['id']) && isset($_POST['quantity_value'])){
                $id = $_POST['id'];
                $quantity_value = $_POST['quantity_value'];
                $room = new room();
                $detail_room = $room->getDetailRooms($id);

                if($detail_room){
                    $detail = $detail_room->fetch();
                    $quantity = $detail['quantity'];
                    $change = $room->changeQuantity($id, $quantity_value);

                    if($change){
                        $res = array(
                            'status' => 200,
                            'message' => "Số khách cho phép đã được cập nhật!",
                            'data' => $quantity_value
                        );
                        echo json_encode($res);
                    }else if($quantity_value == $quantity_value){
                        $res = array(
                            'status' => "duplicate",
                            'message' => "Nếu muốn cập nhật, hãy chọn số khách khác!",
                            'data' => $quantity_value
                        );
                        echo json_encode($res);
                    }else{
                        $res = array(
                            'status' => 403,
                            'message' => "Không thể cập nhật số khách cho phép!",
                            'data' => $quantity_value
                        );
                        echo json_encode($res);
                    }
                }else{
                    $res = array(
                        'status' => 404,
                        'message' => "Lỗi lấy dữ liệu phòng!",
                        'data' => $quantity_value
                    );
                    echo json_encode($res);
                }
            }
            break;
        case "add_service":
            if(isset($_POST['id']) && isset($_POST['sv_value'])){
                $id = $_POST['id'];
                $col = "service_name";
                $sv_add_name = $_POST['sv_value'];
                $room = new room();
                $detail_room = $room->getDetailRooms($id);
                
                if($detail_room){
                    $detail = $detail_room->fetch();
                    //Lấy chuỗi tiện ích
                    $sv_name = $detail['service_name'];
                    $new_sv_name = $sv_name.' - '.$sv_add_name;
                    $add = $room->addOrDeleteDetail($id, $new_sv_name, $col);

                    if($add){
                        $res = array(
                            'status' => 200,
                            'message' => "Đã thêm một tiện ích mới!",
                            'data' => $new_sv_name
                        );
                        echo json_encode($res);
                    }else{
                        $res = array(
                            'status' => 403,
                            'mesasge' => "Không thể thêm!",
                            'data' => NULL
                        );
                        echo json_encode($res);
                    }
                }else{
                    $res = array(
                        'status' => 404,
                        'message' => "Không xác định được chi tiết phòng!",
                        'data' => NULL
                    );
                    echo json_encode($res);
                }
            }            
            break;
        case "delete_service":
            $id = $_POST['id'];
            $sv_max = $_POST['sv_max'];
            $col = "service_name";
            //Lấy tiện ích muốn xoá
            $sv_remove_name = $_POST['sv_remove_name'];
            $room = new room();
            $detail_room = $room->getDetailRooms($id);
            if($detail_room){
                $detail = $detail_room->fetch();
                //Lấy chuỗi tiện ích
                $sv_name = $detail['service_name'];                
                // Chuyển chuỗi tiện ích thành mảng
                $services = explode(" - ", $sv_name);                
                // Tìm và loại bỏ tiện ích cần xóa
                $index = array_search($sv_remove_name, $services);
                if ($index !== false) {
                    unset($services[$index]);
                }                
                // Ghép lại mảng thành chuỗi với định dạng " - "
                $modified_sv_name = implode(" - ", $services);

                $new_sv_name = $room->addOrDeleteDetail($id, $modified_sv_name, $col);
                if($new_sv_name){
                    $res = array(
                        'status' => 200,
                        'message' => 'Đã xoá!',
                        'data' => $modified_sv_name
                    );
                    echo json_encode($res);
                }else{
                    $res = array(
                        'status' => 403,
                        'message' => 'Không thể xoá!',
                        'data' => $new_sv_name
                    );
                    echo json_encode($res);
                }
            }else{
                $res = array(
                    'status' => 404,
                    'message' => 'Lỗi lấy dữ liệu phòng!',
                    'data' => $detail_room
                );
                echo json_encode($res);
            }
            break;
        case "add_requirement":
            if(isset($_POST['id']) && isset($_POST['req_value'])){
                $id = $_POST['id'];
                $col = "requirement";
                $req_add_name = $_POST['req_value'];
                $room = new room();
                $detail_room = $room->getDetailRooms($id);
                
                if($detail_room){
                    $detail = $detail_room->fetch();
                    //Lấy chuỗi tiện ích
                    $req_name = $detail['requirement'];
                    $new_req_name = $req_name.' - '.$req_add_name;
                    $add = $room->addOrDeleteDetail($id, $new_req_name, $col);

                    if($add){
                        $res = array(
                            'status' => 200,
                            'message' => "Đã thêm một tiện ích mới!",
                            'data' => $new_req_name
                        );
                        echo json_encode($res);
                    }else{
                        $res = array(
                            'status' => 403,
                            'mesasge' => "Không thể thêm!",
                            'data' => NULL
                        );
                        echo json_encode($res);
                    }
                }else{
                    $res = array(
                        'status' => 404,
                        'message' => "Không xác định được chi tiết phòng!",
                        'data' => NULL
                    );
                    echo json_encode($res);
                }
            }            
            break;
        case "delete_requirement":
            if(isset($_POST['id']) && isset($_POST['req_max']) && isset($_POST['req_remove_name'])){
                $id = $_POST['id'];
                $col = "requirement";
                $req_max = $_POST['req_max'];
                //Lấy tiện ích muốn xoá
                $req_remove_name = $_POST['req_remove_name'];
                $room = new room();
                $detail_room = $room->getDetailRooms($id);
                if($detail_room){
                    $detail = $detail_room->fetch();
                    //Lấy chuỗi tiện ích
                    $req_name = $detail['requirement'];                
                    // Chuyển chuỗi tiện ích thành mảng
                    $requirements = explode(" - ", $req_name);                
                    // Tìm và loại bỏ tiện ích cần xóa
                    $index = array_search($req_remove_name, $requirements);
                    if ($index !== false) {
                        unset($requirements[$index]);
                    }                
                    // Ghép lại mảng thành chuỗi với định dạng " - "
                    $modified_req_name = implode(" - ", $requirements);

                    $new_req_name = $room->addOrDeleteDetail($id, $modified_req_name, $col);
                    if($new_req_name){
                        $res = array(
                            'status' => 200,
                            'message' => 'Đã xoá!',
                            'data' => $modified_req_name
                        );
                        echo json_encode($res);
                    }else{
                        $res = array(
                            'status' => 403,
                            'message' => 'Không thể xoá!',
                            'data' => $new_req_name
                        );
                        echo json_encode($res);
                    }
                }else{
                    $res = array(
                        'status' => 404,
                        'message' => 'Lỗi lấy dữ liệu phòng!',
                        'data' => $detail_room
                    );
                    echo json_encode($res);
                }
            }            
            break;
        case "add_description":
            if(isset($_POST['id']) && isset($_POST['des_value'])){
                $id = $_POST['id'];
                $col = "description";
                $des_add_name = $_POST['des_value'];
                $room = new room();
                $detail_room = $room->getDetailRooms($id);
                
                if($detail_room){
                    $detail = $detail_room->fetch();
                    //Lấy chuỗi tiện ích
                    $des_name = $detail['description'];
                    $new_des_name = $des_name.' - '.$des_add_name;
                    $add = $room->addOrDeleteDetail($id, $new_des_name, $col);

                    if($add){
                        $res = array(
                            'status' => 200,
                            'message' => "Đã thêm một tiện ích mới!",
                            'data' => $new_des_name
                        );
                        echo json_encode($res);
                    }else{
                        $res = array(
                            'status' => 403,
                            'mesasge' => "Không thể thêm!",
                            'data' => NULL
                        );
                        echo json_encode($res);
                    }
                }else{
                    $res = array(
                        'status' => 404,
                        'message' => "Không xác định được chi tiết phòng!",
                        'data' => NULL
                    );
                    echo json_encode($res);
                }
            }            
            break;
        case "delete_description":
            if(isset($_POST['id']) && isset($_POST['des_max']) && isset($_POST['des_remove_name'])){
                $id = $_POST['id'];
                $col = "description";
                $des_max = $_POST['des_max'];
                //Lấy tiện ích muốn xoá
                $des_remove_name = $_POST['des_remove_name'];
                $room = new room();
                $detail_room = $room->getDetailRooms($id);
                if($detail_room){
                    $detail = $detail_room->fetch();
                    //Lấy chuỗi tiện ích
                    $des_name = $detail['description'];                
                    // Chuyển chuỗi tiện ích thành mảng
                    $descriptions = explode(" - ", $des_name);                
                    // Tìm và loại bỏ tiện ích cần xóa
                    $index = array_search($des_remove_name, $descriptions);
                    if ($index !== false) {
                        unset($descriptions[$index]);
                    }                
                    // Ghép lại mảng thành chuỗi với định dạng " - "
                    $modified_des_name = implode(" - ", $descriptions);

                    $new_des_name = $room->addOrDeleteDetail($id, $modified_des_name, $col);
                    if($new_des_name){
                        $res = array(
                            'status' => 200,
                            'message' => 'Đã xoá!',
                            'data' => $modified_des_name
                        );
                        echo json_encode($res);
                    }else{
                        $res = array(
                            'status' => 403,
                            'message' => 'Không thể xoá!',
                            'data' => $new_des_name
                        );
                        echo json_encode($res);
                    }
                }else{
                    $res = array(
                        'status' => 404,
                        'message' => 'Lỗi lấy dữ liệu phòng!',
                        'data' => $detail_room
                    );
                    echo json_encode($res);
                }
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