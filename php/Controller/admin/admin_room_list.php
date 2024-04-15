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
                $img = $_FILES['img']['name'];

                if ($flag == false) {                 
                    $room = new room();
                    $result = $room->createRoom($name, $kind, $price, $sale, $img);                    
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Thành công!',
                                text: 'Thêm mới thành công!',
                                icon: 'success'
                            });
                            setTimeout(() => {
                                window.location.href = './admin_index.php?action=admin_room_list&act=room_create';
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
        case "update_action": 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id = $_POST['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $sale = $_POST['sale'];
                $img = $_FILES['img']['name'];
                $kind_id = $_POST['kind'];
                $status_id = $_POST['status_id'];

                $room = new room();
                $result = $room->updateRoom($id, $name, $kind_id, $price, $sale, $status_id, $img);
                if($result){
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Thành công!',
                                text: 'Cập nhật thành công!',
                                icon: 'success'
                            });
                            setTimeout(() => {
                                window.location.href = './admin_index.php?action=admin_room_list';
                            }, 1600);
                      </script>";
                    // echo '<meta http-equiv="refresh" content="0;url=./admin_index.php?action=admin_room_list"/>';
                }else{
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Thất bại!',
                                text: 'Cập nhật thất bại!',
                                icon: 'error'
                            });
                            setTimeout(() => {
                                window.location.href = './admin_index.php?action=admin_room_list';
                            }, 1600);
                      </script>";
                    // include_once "View/admin/admin_room_list.php";
                }
            }       
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
                    "message" => "Lenh SQL, kieu du lieu(JSON), json_encode"
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
                    "message" => "Lenh SQL, kieu du lieu(JSON), json_encode"
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
                    "message" => "Lenh SQL, kieu du lieu(JSON), json_encode"
                );
            }
            echo json_encode($res);
            break;     
            
    }
?>