<?php
require './connect.php';

$mail = $_POST['email'];
$pass = $_POST['password'];

$log = $conn->prepare('SELECT * FROM customers WHERE email = ?');
$log->bind_param("s", $mail);
$log->execute();
$logres = $log->get_result();
if ($logres->num_rows > 0) {
    $data = $logres->fetch_assoc();
    if ($data['password'] == $pass) {
        $_SESSION['Email'] = $data['Email'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['phone'] = $data['phone_number'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['id'] = $data['id'];
        $_SESSION['photo'] = $data['photo'];
        header("Location: ../index.php");
        exit(); // Ensure script termination after redirection
    } else {
        echo "<h2>Failed</h2>";
        header("Location: ../register.php");
        exit(); // Ensure script termination after redirection
    }
} else {
    echo "<h2>Failed</h2>";
    header("Location: ../register.php");
    exit(); // Ensure script termination after redirection
}

$log->close();
$conn->close();
?>
