<?php 
    $host   ="localhost";
    $user   ="root";
    $pass   ="";
    $db     ="kodepos";

        $con = mysqli_connect($host,$user,$pass,$db);
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
            
?>