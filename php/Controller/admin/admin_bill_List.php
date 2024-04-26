<?php
    $act = "admin_bill_list";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }

    switch ($act) {
        case 'admin_bill_list':
            include_once "View/admin/admin_bill_list.php";
            break;
    }
?>