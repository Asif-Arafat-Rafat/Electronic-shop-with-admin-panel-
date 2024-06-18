<?php
    $conn= new mysqli("localhost",'root','','E-shop');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }

?>