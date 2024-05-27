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
    }
?>