<?php
    set_include_path(get_include_path() . PATH_SEPARATOR . '../../Model/');
    spl_autoload_extensions('.php');    
    spl_autoload_register();

    $act = "login";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }

    switch($act){
        case "login":
            include_once "View/user/login.php";
            break;
        case "login_action":
            if(isset($_POST['email']) && isset($_POST['password'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $alreadyHave = 0;
                // $customer = array();
                $customers = new customers();
                $validate = new validate();

                $all_cus = $customers->getAllCus();     
                $cus = $all_cus->fetch(PDO::FETCH_ASSOC);

                //Kiểm tra có bất kì record nào đã có email giống với $email
                foreach($cus as $cust){
                    if($cust['email'] == $email && $cust['email_guest'] == null){
                        $alreadyHave = 1;
                        $customer = $cust;
                    }else{
                        $alreadyHave = 0;
                    }
                    echo json_encode($cust);exit;
                }

                //Nếu tìm thấy email trùng với cái đã nhập trên input thì thực hiện kiểm tra pass
                if($alreadyHave == 1){
                    $hashed_pass = $customer['password'];
                    //Nếu pass nhập == pash database
                    if(password_verify($password, $hashed_pass)){
                        $_SESSION['customer_id'] = $customer['id'];
                        $_SESSION['customer_name'] = $customer['customer_name'];
                        $ress = array(
                            'status' => 200,
                            'message' => 'Đăng nhập thành công1'
                        );
                    }
                    //Nếu không trùng
                    else{
                        $res = array(
                            'status' => 403,
                            'message' => "Sai mật khẩu hoặc tài khoản!"
                        );
                    }
                }
                //Nếu tài khoản không tồn tại
                else{
                    $res = array(
                        'status' => 404,
                        'message' => "Tài khoản không tồn tại!"
                    );
                }

                // //Kiểm tra email đã tồn tại chưa
                // $checkEmail = $validate->checkEmail($email);
                // $checkEmail->execute();
                // $emailExist = $checkEmail->fetchColumn();
                // //Chưa tồn tại -> báo lỗi
                // if($checkEmail == 0){
                //     $res = array(
                //         'status' => 404,
                //         'message' => 'Email không tồn tại'
                //     );
                // }
                // //Đã tồn tại -> tiếp tục
                // else{
                //     $checkPassword = $validate->checkPassword($email, $password);
                //     $customer = array(); 
                //     $customer = $checkPassword->fetch(PDO::FETCH_ASSOC);                    
                //     $hashed_pass = $customer['password'];                    
                //     //Nếu password trùng
                //     if($hashed_pass == $password){
                //         $_SESSION['customer_id'] = $customer['id'];
                //         $_SESSION['customer_name'] = $customer['customer_name'];
                //         $ress = array(
                //             'status' => 200,
                //             'message' => 'Đăng nhập thành công1'
                //         );
                //     }else{
                //         $res = array(
                //             'status' => 403,
                //             'message' => "Đăng nhập thất bại!"
                //         );
                //     }
                // }
            }
            break;
    }    
?>