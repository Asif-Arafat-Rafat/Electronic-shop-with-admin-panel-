<?php
session_start();
require "./connect.php";
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone_number'];
$pass=$_POST['password'];
$address=$_POST['address'];
$c_pass=$_POST['con_password'];
$file=$_FILES['photo']['name'];
$tempname = $_FILES['photo']['tmp_name'];
$folder = '../images/'.$file;
if($c_pass==$pass){
    $regi=$conn->prepare("insert into customers(name,Email,phone_number,password,photo,address) values(?,?,?,?,?,?)");
    $regi->bind_param("ssisss",$name,$email,$phone,$pass,$file,$address);
    if($regi){
        move_uploaded_file($tempname,$folder);
    }
    $regi->execute();
    $regi->close();
    $conn->close();
    header('location: ./login.php');}
?>