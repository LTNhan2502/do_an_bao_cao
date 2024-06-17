<?php
    // auth.php

    //Auth cho admin
    function isAuthenticated() {
        return isset($_SESSION['current_user']);
    }
    function redirectToLogin() {
        header("Location: admin_index.php?action=admin_login");
        exit();
    }
    function redirectToAdminHome() {
        header("Location: admin_index.php?action=admin_home");
        exit();
    }

    //Auth cho user
    function isAuthenUser(){
        return isset($_SESSION['customer_id']);
    }
    function redirectToLoginUser() {
        header("Location: index.php?action=login");
        exit();
    }
    function redirectToUserHome() {
        header("Location: index.php?action=home");
        exit();
    }
?>
