<?php
session_start();
require "./connect.php";

// Check if any data is submitted
if (!empty($_POST)) {
    // Check if name is submitted
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $stmt = $conn->prepare("UPDATE customers SET name=? WHERE id=?");
        $stmt->bind_param("si", $name, $_SESSION['id']);
        $stmt->execute();
        $_SESSION['name'] = $name; // Update session variable
        $stmt->close();
    }

    // Similarly handle email and phone number updates
    // Example:
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $stmt = $conn->prepare("UPDATE customers SET email=? WHERE id=?");
        $stmt->bind_param("si", $email, $_SESSION['id']);
        $stmt->execute();
        $_SESSION['Email'] = $email; // Update session variable
        $stmt->close();
    }

    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        $stmt = $conn->prepare("UPDATE customers SET phone_number=? WHERE id=?");
        $stmt->bind_param("si", $phone, $_SESSION['id']);
        $stmt->execute();
        $_SESSION['phone'] = $phone; // Update session variable
        $stmt->close();
    }
    if (isset($_POST['password']) && isset($_POST['con_password'])) {
        if( $_POST['con_password']==$_POST['password']){
            $pass = $_POST['password'];
            $stmt = $conn->prepare("UPDATE customers SET password=? WHERE id=?");
            $stmt->bind_param("si", $pass, $_SESSION['id']);
            $stmt->execute();
            $_SESSION['password'] = $pass; // Update session variable
            $stmt->close();
        }
        else{
            $_SESSION['msg']="Passwords dont match";
        }
    }

    // Handle photo update
    if (isset($_FILES['photo'])) {
        $file = $_FILES['photo']['name'];
        $tempname = $_FILES['photo']['tmp_name'];
        $folder = '../images/' . $file;
        
        // Check if file is uploaded successfully
        if (move_uploaded_file($tempname, $folder)) {
            $stmt = $conn->prepare("UPDATE customers SET photo=? WHERE id=?");
            $stmt->bind_param("si", $file, $_SESSION['id']);
            $stmt->execute();
            $_SESSION['photo'] = $file; // Update session variable
            $stmt->close();
        }
    }

    $conn->close();
}

// Redirect back to profile page

header('location:../profile.php');
exit();
?>
