<?php
    include "../backend/connect.php";
    
    $sql_admin='SELECT * FROM admin';
    $con_admin=mysqli_query($conn,$sql_admin);
    $sql_customer='SELECT * FROM customers';
    $con_customer=mysqli_query($conn,$sql_customer);
    $sql_lsec='SELECT * FROM product_section where type = "laptop"';
    $con_lsec=mysqli_query($conn,$sql_lsec);
    $sql_psec='SELECT * FROM product_section where type = "phone"';
    $con_psec=mysqli_query($conn,$sql_psec);
    $sql_csec='SELECT * FROM product_section where type = "component"';
    $con_csec=mysqli_query($conn,$sql_csec);
    $sql_acsec='SELECT * FROM product_section where type = "access"';
    $con_acsec=mysqli_query($conn,$sql_acsec);
    $sql_ausec='SELECT * FROM product_section where type = "arduino"';
    $con_ausec=mysqli_query($conn,$sql_ausec);
    $sql_orsec='SELECT * FROM orders';
    $con_orsec=mysqli_query($conn,$sql_orsec);
    $sql_uorsec='SELECT * FROM orders where delivered=0';
    $con_uorsec=mysqli_query($conn,$sql_uorsec);

?>