<?php
session_start();
include "./connect.php";

    $id=$_GET['id'];
    $sql="SELECT * FROM product_section where id=$id";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row['quantity']==0){
        die('product out of stock');
    }
    if(!isset($_SESSION['name'])){
        die(' please Login');
    }
    $regi = $conn->prepare("INSERT INTO cart(user_id, product_id) VALUES (?,?)");
    $regi->bind_param("ii", $_SESSION['id'],$id);
    $regi->execute();
    header('location:../index.php');
?>