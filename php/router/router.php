<?php
    // router.php
    function route($action) {
        $controllerPath = 'Controller/admin/' . $action . '.php';
        if (file_exists($controllerPath)) {
            include $controllerPath;
        } else {
            // Optionally handle 404
            include 'Controller/admin/404.php';
        }
    }
?>
