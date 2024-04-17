<?php
    $act = "admin_room_book";
    if(isset($_GET["act"])){
        $act = $_GET["act"];
    }
    switch($act){
        case "admin_room_book":
            include_once "View/admin/admin_room_book.php";
            break;
        case "book":
            break;
    }
?>