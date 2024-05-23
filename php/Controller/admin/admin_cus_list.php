<?php
    $act = "admin_cus_list";
    if (isset($_GET["act"])){
        $act = $_GET["act"];
    }

    switch ($act){
        case "admin_cus_list":
            include_once "View/admin/admin_cus_list.php";
            break;
    }
?>