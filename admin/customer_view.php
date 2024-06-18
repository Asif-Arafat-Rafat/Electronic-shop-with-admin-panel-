<?php
// Start or resume the session
session_start();

// Include database connection
include_once "../backend/connect.php";

// Check if user is logged in
if (!isset($_SESSION['admin_username'])) {
    header('location:./index.php');
    exit();
}

// Query to fetch customers from the database
$query = "SELECT * FROM customers";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User View</title>
    <!-- Add dark lord theme CSS here -->
    <link rel="stylesheet" href="./prodet.css">
</head>
<body>

<?php
    include "./admin_section/nav.php";
?>

<div class="main">
    <div class="section">
        <h3>User View</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <!-- Add more table headers as needed -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['Email']}</td>";
                    echo "<td>{$row['phone_number']}</td>";
                    echo "<td>{$row['address']}</td>";
                    // Add more table cells for other columns if needed
                    echo "<td><button onclick='removeUser({$row['id']})'>Remove</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function removeUser(userId) {
    if (confirm('Are you sure you want to remove this user?')) {
        // Send AJAX request to remove user from database
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'remove_user.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // User removed successfully, reload the page
                    location.reload();
                } else {
                    // Handle error
                    console.error('Error:', xhr.responseText);
                }
            }
        };
        xhr.send('id=' + userId);
    }
}
</script>

</body>
</html>
