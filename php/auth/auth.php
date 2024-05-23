<?php
    // auth.php
    function isAuthenticated() {
        return isset($_SESSION['admin']);
    }

    function redirectToLogin() {
        header("Location: admin_index.php?action=admin_login");
        exit();
    }
?>
