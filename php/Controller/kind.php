<?php
    $act = "kind";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }
    switch($act){
        case "kind":
            include_once "View/home.php";
            break;
        case "single":
            include_once "View/kind.php";
            break;
    }
?>