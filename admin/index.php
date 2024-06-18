<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../backend/connect.php';
    $sql='select * from admin where admin_username="'.$_POST['admin_username'].'"';
    $adc=mysqli_query($conn,$sql);
    if(mysqli_num_rows($adc)>0){
    $data=mysqli_fetch_assoc($adc);
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    if ($admin_password === $data['admin_password']) {
        $_SESSION['admin_username'] = $admin_username;
        header("Location: dashboard.php");
        exit;
    } else {
        die(' '.mysqli_fetch_assoc($sql).' is incorrect ');
    }}
    else{
        die("No such admin exists");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your HTML head content here -->
    <title>Admin Login</title>
    <link rel="stylesheet" href="./style.css">

</head>
<body>
    <!-- Admin login form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="admin_username">Username:</label>
        <input type="text" name="admin_username" required>
        <label for="admin_password">Password:</label>
        <input type="password" name="admin_password" required>
        <input type="submit" value="Login">
    </form>
    <?php if(isset($error_message)) { echo "<p>$error_message</p>"; } ?>
</body>
</html>
