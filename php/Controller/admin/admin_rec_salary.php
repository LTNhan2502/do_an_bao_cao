<?php
    $act = "admin_rec_salary";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }

    switch ($act) {
        case 'admin_rec_salary':
            include_once "View/admin/admin_rec_salary.php";
            break;
        case "":
            break;
    }
?>