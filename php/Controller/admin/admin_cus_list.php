<?php
    set_include_path(get_include_path() . PATH_SEPARATOR . '../../Model/');
    spl_autoload_extensions('.php');    
    spl_autoload_register();

    $act = "admin_cus_list";
    if (isset($_GET["act"])){
        $act = $_GET["act"];
    }

    switch ($act){
        case "admin_cus_list":
            include_once "View/admin/admin_cus_list.php";
            break;
        case "update_name":
            if(isset($_POST['name_value']) && isset($_POST['id'])){
                $id = $_POST['id'];
                $name_value = $_POST['name_value'];
                
                $rec = new customers();
                $result = $rec->changeCusName($id, $name_value);
                if($result){
                    $res = array(
                        "status" => 200,
                        "message" => "changed"
                    );
                }else{
                    $res = array(
                        "status" => 403,
                        "message" => "Lenh SQL, kieu du lieu (JOSN), json_encode, value view"
                    );
                }
                echo json_encode($res);
            }
            break;
        case "update_tel":
            if(isset($_POST['tel_value']) && isset($_POST['id'])){
                $id = $_POST['id'];
                $tel_value = $_POST['tel_value'];
                
                $rec = new customers();
                $result = $rec->changeCusTel($id, $tel_value);
                if($result){
                    $res = array(
                        "status" => 200,
                        "message" => "changed"
                    );
                }else{
                    $res = array(
                        "status" => 403,
                        "message" => "fail"
                    );
                
                }
                
                echo json_encode($res);
            }
            break;
        case "update_email":
            if(isset($_POST['email_value']) && isset($_POST['id']) && isset($_POST['act'])){
                $id = $_POST['id'];
                $email_value = $_POST['email_value'];
                $act = $_POST['act'];
                
                $rec = new customers();
                if($act == 'member'){
                    $result = $rec->changeEmailMember($id, $email_value);
                }else{
                    $result = $rec->changeEmailGuest($id, $email_value);
                }
                if($result){
                    $res = array(
                        "status" => 200,
                        "message" => "changed"
                    );
                }else{
                    $res = array(
                        "status" => 403,
                        "message" => "fail"
                    );
                }               
                
                echo json_encode($res);
            }
            break;
    }
?>