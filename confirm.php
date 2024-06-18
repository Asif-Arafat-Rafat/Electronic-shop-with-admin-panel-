<?php
session_start();

include './backend/connect.php';

$p = $_GET['p'];
$uid = $_SESSION['id'];

if (!isset($_SESSION['name'])) {
    die('Please login');
}

if ($p == 1) {
    $pa = 'online';
} else {
    $pa = 'cod';
}

// Fetch cart items
$sql = "SELECT * FROM cart WHERE user_id = $uid";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Error fetching cart items: ' . mysqli_error($conn));
}

// Build ordered products string
$op = '';
while ($r = mysqli_fetch_assoc($result)) {
    $op .= ',' . $r['product_id'];
}

// Determine payment process
$pa = ($p == 1) ? 'online' : 'cod';

// Prepare and execute INSERT statement for orders table
$zero = 0;
$conf = $conn->prepare("INSERT INTO orders (customer_id, delivered, payment_process, ordered_products, total_price, paid) VALUES (?, ?, ?, ?, ?, ?)");
$conf->bind_param("iissii", $uid, $zero, $pa, $op, $_GET['tp'], $p);
$conf->execute();

if ($conf->error) {
    die('Error executing INSERT statement: ' . $conf->error);
}

// Prepare and execute DELETE statement for cart table
$cond = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
$cond->bind_param("i", $uid);
$cond->execute();

if ($cond->error) {
    die('Error executing DELETE statement: ' . $cond->error);
}

header('location: ./index.php');
?>
