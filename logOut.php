<?php         
        $cookie_name = "logged_in_project";
        setcookie($cookie_name,"",time()-(86400),"/");
        $cookie_name = "user_id";
        setcookie($cookie_name,"",time()-(86400),"/");
        $cookie_name = "user_admin";
        setcookie($cookie_name,"",time()-(86400),"/");

        header("location: index.php");
?>