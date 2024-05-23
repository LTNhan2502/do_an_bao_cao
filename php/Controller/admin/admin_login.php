<?php
    $act = "admin_login";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }
    switch($act){
        case "admin_login":
            include_once "View/admin/admin_login.php";
            break;
        case "login_action":
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $user = $_POST['txtusername'];
                $pass = $_POST['txtpass'];
                //Đem so sánh trong dbs xem có hay không
                $admin = new admin();
                $check = $admin->getAdmin($user, $pass);
                $a = $check->fetch();
                if($check !== false){
                    $_SESSION['admin'] = $a['id'];
                    $_SESSION['tenadmin'] = $a['username'];
                    echo "<script> alert('Đăng nhập thành công'); </script>";
                    echo '<meta http-equiv="refresh" content="0;url=./admin_index.php?action=admin_home"/>';
                }else{
                    echo '<script>alert("Đăng nhập thất bại");</script>';
                    include_once "./View/admin/admin_login.php";
                }
            }
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