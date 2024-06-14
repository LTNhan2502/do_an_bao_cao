<?php
    function checkAuthority($uri = false){
        $uri = $uri == false ? $_SERVER['REQUEST_URI'] : $uri;
        $authorities = $_SESSION['current_user']['authorities'];
        //Gộp các đường link lại để kiểm tra
        $authorities = implode("|", $authorities);
        //Kiểm tra nếu vào 1 trong các đường link trên thì cho phép, ngoài đường link thì không cho vào
        preg_match('/'.$authorities.'/', $uri, $matches);
        return !empty($matches);
    }


?>