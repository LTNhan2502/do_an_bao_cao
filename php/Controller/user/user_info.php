<?php
    set_include_path(get_include_path() . PATH_SEPARATOR . '../../Model/');
    spl_autoload_extensions('.php');    
    spl_autoload_register();

    $act = 'user_info';
    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }

    switch($act){
        case "user_info":
            include_once "View/user/user_info.php";
            break;
        case "delete_action":
            if($_POST['customer_email']){
                $email = $_POST['customer_email'];
                $customers = new customers();
                $result = $customers->deleteCus($email);

                if($result){
                    unset($_SESSION['customer_id']);
                    unset($_SESSION['customer_email']);
                    unset($_SESSION['customer_name']);
                    $res = array(
                        'status' => 200,
                        'message' => "Xoá tài khoản thành công!"
                    );
                }else{
                    $res = array(
                        'status' => 403,
                        'message' => "Xoá tài khoản thất bại!"
                    );
                }
                echo json_encode($res);
            }
            break;
    }
?>