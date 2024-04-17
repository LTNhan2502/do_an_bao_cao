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
            $flag = false;
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = $_POST['name'];
                $kind = $_POST['kind'];
                $price = $_POST['price'];
                $sale = $_POST['sale'];
                $status_id = $_POST['status_id'];
                $img = $_FILES['img']['name'];

                if ($flag == false) {                 
                    $room = new room();
                    $result = $room->createRoom($name, $kind, $price, $sale, $status_id, $img);                    
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Thành công!',
                                text: 'Thêm mới thành công!',
                                icon: 'success'
                            });
                            setTimeout(() => {
                                window.location.href = './admin_index.php?action=admin_room_list&act=create_room';
                            }, 1600);
                      </script>";
                    // echo '<meta http-equiv="refresh" content="0;url=./admin_index.php?action=admin_room_list&act=room_create"/>';
                }else{ 
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Thất bại!',
                                text: 'Thêm mới thất bại!',
                                icon: 'error'
                            });
                            setTimeout(() => {
                                window.location.href = './admin_index.php?action=admin_room_list&act=room_create';
                            }, 1600);
                      </script>";                   
                    // echo '<meta http-equiv="refresh" content="0;url=./admin_index.php?action=admin_room_list&act=room_create"/>';
                }
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
                echo json_encode($res);
            }
            break;
        case "update_price":
            if(isset($_POST['price_value']) && isset($_POST['id'])){
                $id = $_POST['id'];
                $price_value = $_POST['price_value'];
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
                echo json_encode($res);
            }
            break;
        case "update_sale":
            if(isset($_POST['id']) && isset($_POST['sale_value']) && isset($_POST['price_value'])){
                $flag = false;
                $id = $_POST['id'];
                $sale_value = $_POST['sale_value'];
                $price_value = $_POST['price_value'];
                $room = new room();
                if($sale_value < $price_value){
                    $result = $room->changeSale($id, $sale_value);
                    $flag = false;
                }else{
                    $flag = true;
                    $res = array(
                        "status" => "fail",
                        "message" => "Lệnh SQL, kiểu dữ liệu (JSON), json_encode, value view",
                    );
                }
                if($flag == false){
                    $res = array(
                        "status" => "success",
                        "message" => "changed"
                    );
                }else{
                    $res = array(
                        "status" => "fail",
                        "message" => "Sale phải nhỏ hơn Price!"
                    );
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
                echo json_encode($res);
            }
            
            break;
    }
?>