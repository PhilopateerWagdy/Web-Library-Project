<?php
        session_start();
        

        $isbn = $_POST["ISPN"];
        setcookie("borrow",$isbn, time() +3600*2);

        
                header("location: Admin.php");
        
      
?>