<?php
    set_include_path(get_include_path() . PATH_SEPARATOR . '../../Model/');
    spl_autoload_extensions('.php');
    spl_autoload_register();

    $act = "admin_login";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }
    switch($act){
        case "admin_login":
            include_once "View/admin/admin_login.php";
            break;
        case 'admin_change_password':
            include_once "View/admin/admin_login.php";
            break;
        case "login_action":
            if(isset($_POST['txtusername']) && isset($_POST['txtpass'])){
                $user = $_POST['txtusername'];
                $pass = $_POST['txtpass'];
                //Đem so sánh trong dbs xem có hay không
                $admin = new admin();
                $validate = new validate();
                $isExist = $validate->checkExistAdmin($user);
                //Nếu không có
                if(!$isExist){
                    $res = array(
                        'status' => 404,
                        'message' => 'Tài khoản không tồn tại!'
                    );
                }
                //Nếu có
                else{
                    $hashed_password = $isExist['pass'];
                    $isTruePass = password_verify($pass, $hashed_password);
                    //Mật khẩu đúng
                    if($isTruePass){
                        //Nếu đã có session admin
                        if(isset($_SESSION['admin'])){
                            $res = array(
                                //Yêu cầu không thành công do thất bại của yêu cầu trước đó - Failed Dependency.
                                'status' => 424,
                                'message' => "Phiên của bạn vẫn chưa hết hạn!"
                            );
                        }else{
                            $check = $admin->getAdmin($user, $hashed_password);
                            $user = $check->fetch();
                            if($check !== false){
                                $_SESSION['admin'] = $user['id'];
                                $_SESSION['tenadmin'] = $user['username'];
                                
                                $user['authorities'] = array(
                                    'admin_index\.php\?action=admin_home',
                                    'admin_index\.php\?action=admin_room_list',
                                    'admin_room_list.*act=create_room',
                                    'admin_room_list.*act=edit_detail&id',
                                    'admin_room_list.*act=delete_room',
                                    'admin_index\.php\?action=admin_room_book',
                                    'admin_index\.php\?action=admin_bill_list$',
                                    'admin_index\.php\?action=admin_rec_list$',
                                    'admin_rec_list.*act=create_action',
                                    'admin_rec_list.*act=edit_rec&id',
                                    'admin_rec_list.*act=soft_delete',
                                    'admin_index\.php\?action=admin_rec_salary',
                                    'admin_index\.php\?action=admin_cus_list$',
                                    'admin_cus_list.*act=create_action',
                                    'admin_cus_list.*act=soft_delete',
                                    'admin_index\.php\?action=admin_authority',
                                    'admin_index\.php\?action=admin_authorize',
                                );
                                
                                $_SESSION['current_user'] = $user;

                                $res = array(
                                    'status' => 200,
                                    'message' => 'Đăng nhập thành công!',
                                );                                
                                // echo '<meta http-equiv="refresh" content="0;url=./admin_index.php?action=admin_home"/>';
                            }
                        }
                    }
                    //Sai mật khẩu
                    else{
                        $res = array(
                            'status' => 403,
                            'message' => "Sai mật khẩu!"
                        );
                        // include_once "View/admin/admin_login.php";
                    }
                }
                echo json_encode($res);
            }
            break;
        case 'change_pass':
            $username = $_POST['username'];
            $pass_admin = $_POST['new_pass'];
            $admin = new admin();
            $hashed = password_hash($pass_admin, PASSWORD_DEFAULT);
            $change = $admin->changePassAdmin($username, $hashed);
            if($change){
                $res = array(
                    'status' => 200,
                    'message' => "Thay đổi mật khẩu thành công!"
                );
            }
            echo json_encode($res);
            break;
        case "logout":
            unset($_SESSION["admin"]);
            unset($_SESSION["tenadmin"]);
            echo "<script> 
                    Swal.fire({
                        title: 'Đăng xuất thành công!',
                        icon: 'success'
                    });
                </script>";
            include_once "View/admin/admin_login.php";
            break;
    }
?>